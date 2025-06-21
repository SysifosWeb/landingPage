<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Validation\ValidationException;
use Inertia\Inertia;

class LoginController extends Controller
{
    /**
     * Mostrar formulario de login
     */
    public function showLoginForm()
    {
        return Inertia::render('Auth/Login');
    }

    /**
     * Procesar login con protección robusta
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        // Rate limiting por IP
        $key = 'login.' . $request->ip();
        if (RateLimiter::tooManyAttempts($key, 5)) {
            $seconds = RateLimiter::availableIn($key);
            Log::warning('Login rate limit exceeded', [
                'ip' => $request->ip(),
                'email' => $credentials['email'],
                'user_agent' => $request->userAgent(),
            ]);

            throw ValidationException::withMessages([
                'email' => "Demasiados intentos de login. Intenta de nuevo en {$seconds} segundos.",
            ]);
        }

        // Buscar usuario y verificar si está bloqueado
        $user = User::where('email', $credentials['email'])->first();

        if ($user) {
            // Verificar si la cuenta está activa
            if (!$user->active) {
                Log::warning('Login attempt on inactive account', [
                    'email' => $credentials['email'],
                    'ip' => $request->ip(),
                ]);

                throw ValidationException::withMessages([
                    'email' => 'Tu cuenta ha sido desactivada. Contacta al administrador.',
                ]);
            }

            // Verificar si la cuenta está bloqueada
            if ($user->isLocked()) {
                Log::warning('Login attempt on locked account', [
                    'email' => $credentials['email'],
                    'ip' => $request->ip(),
                    'locked_until' => $user->locked_until,
                ]);

                throw ValidationException::withMessages([
                    'email' => 'Tu cuenta está temporalmente bloqueada por seguridad.',
                ]);
            }
        }

        // Intentar autenticación
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            $user = Auth::user();

            // Verificar si es admin o editor
            if (!$user->canManageContent()) {
                Auth::logout();

                Log::warning('Login attempt without admin permissions', [
                    'email' => $credentials['email'],
                    'ip' => $request->ip(),
                    'role' => $user->role,
                ]);

                throw ValidationException::withMessages([
                    'email' => 'No tienes permisos para acceder al panel de administración.',
                ]);
            }

            // Login exitoso - resetear intentos y actualizar datos
            $user->resetLoginAttempts();
            RateLimiter::clear($key);

            Log::info('Successful admin login', [
                'email' => $user->email,
                'ip' => $request->ip(),
                'role' => $user->role,
            ]);

            $request->session()->regenerate();
            return redirect()->intended('/admin');
        }

        // Login fallido - incrementar rate limiting y intentos del usuario
        RateLimiter::hit($key, 300); // 5 minutos

        if ($user) {
            $user->incrementLoginAttempts();
        }

        Log::warning('Failed login attempt', [
            'email' => $credentials['email'],
            'ip' => $request->ip(),
            'user_agent' => $request->userAgent(),
        ]);

        throw ValidationException::withMessages([
            'email' => 'Las credenciales no son correctas.',
        ]);
    }

    /**
     * Logout seguro
     */
    public function logout(Request $request)
    {
        $user = Auth::user();

        Log::info('User logout', [
            'email' => $user->email ?? 'unknown',
            'ip' => $request->ip(),
        ]);

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('message', 'Sesión cerrada correctamente.');
    }
}
