<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Mail\NewContactNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Log;

class ContactFormController extends Controller
{
    /**
     * Enviar formulario de contacto
     */
    public function store(Request $request)
    {
        // Rate limiting por IP
        $key = 'contact.' . $request->ip();

        if (RateLimiter::tooManyAttempts($key, 3)) {
            $seconds = RateLimiter::availableIn($key);
            throw ValidationException::withMessages([
                'email' => "Has enviado demasiados mensajes. Intenta de nuevo en {$seconds} segundos.",
            ]);
        }

        $validated = $request->validate([
            'name' => 'required|string|max:255|min:2',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:20',
            'company' => 'nullable|string|max:255',
            'subject' => 'required|string|max:255|min:5',
            'message' => 'required|string|max:2000|min:10',
        ], [
            'name.required' => 'El nombre es obligatorio.',
            'name.min' => 'El nombre debe tener al menos 2 caracteres.',
            'email.required' => 'El email es obligatorio.',
            'email.email' => 'El email debe tener un formato válido.',
            'subject.required' => 'El asunto es obligatorio.',
            'subject.min' => 'El asunto debe tener al menos 5 caracteres.',
            'message.required' => 'El mensaje es obligatorio.',
            'message.min' => 'El mensaje debe tener al menos 10 caracteres.',
            'message.max' => 'El mensaje no puede exceder los 2000 caracteres.',
        ]);

        // Verificar si ya existe un contacto reciente con el mismo email
        $recentContact = Contact::where('email', $validated['email'])
            ->where('created_at', '>=', now()->subHours(1))
            ->first();

        if ($recentContact) {
            throw ValidationException::withMessages([
                'email' => 'Ya has enviado un mensaje recientemente. Espera al menos 1 hora antes de enviar otro.',
            ]);
        }

        // Crear el contacto
        $contact = Contact::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'company' => $validated['company'],
            'subject' => $validated['subject'],
            'message' => $validated['message'],
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent(),
            'metadata' => [
                'referrer' => $request->header('referer'),
                'timestamp' => now()->toISOString(),
            ],
        ]);

        // Enviar notificación por correo
        try {
            $notificationEmail = config('mail.notification_email') ?? config('mail.from.address');

            if ($notificationEmail) {
                Mail::to($notificationEmail)
                    ->send(new NewContactNotification($contact));

                Log::info('Correo de contacto enviado', [
                    'contact_id' => $contact->id,
                    'to' => $notificationEmail,
                ]);
            }
        } catch (\Exception $e) {
            // Registrar el error pero no interrumpir el flujo
            Log::error('Error al enviar correo de contacto', [
                'contact_id' => $contact->id,
                'error' => $e->getMessage(),
            ]);
        }

        // Incrementar rate limit
        RateLimiter::hit($key, 3600); // 1 hora

        return back()->with('success', '¡Gracias por tu mensaje! Te contactaremos pronto.');
    }
}
