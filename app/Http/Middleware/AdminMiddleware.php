<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Verificar si el usuario está autenticado
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        $user = Auth::user();

        // Verificar si la cuenta está activa
        if (!$user->active) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Tu cuenta ha sido desactivada.'
            ]);
        }

        // Verificar si la cuenta está bloqueada
        if ($user->isLocked()) {
            Auth::logout();
            return redirect()->route('login')->withErrors([
                'email' => 'Tu cuenta está temporalmente bloqueada.'
            ]);
        }

        // Verificar si tiene permisos de administración
        if (!$user->canManageContent()) {
            return redirect()->route('home')->withErrors([
                'access' => 'No tienes permisos para acceder a esta área.'
            ]);
        }

        return $next($request);
    }
}
