<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use App\Application\Users\RegisterUser;
use App\Application\Auth\LoginUser;
use App\Application\Auth\LogoutUser;
use App\Application\Users\GetAuthenticatedUser;

/**
 * Controlador HTTP (adaptador de interfaz).
 *
 * Recibe y valida requests, delega la lógica a los casos de uso
 * de la capa Application y construye las respuestas JSON.
 */
class AuthController extends Controller
{
    public function __construct(
        private readonly RegisterUser $registerUser,
        private readonly LoginUser $loginUser,
        private readonly LogoutUser $logoutUser,
        private readonly GetAuthenticatedUser $getAuthenticatedUser,
    ) {}

    public function register(Request $request)
    {
        // Validación de entrada propia del adaptador HTTP
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        [$user, $token] = $this->registerUser->execute(
            $validated['name'],
            $validated['email'],
            $validated['password']
        );

        return response()->json([
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ],
            'token' => $token,
        ], 201);
    }

    public function login(Request $request)
    {
        // Validación de entrada propia del adaptador HTTP
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);
        [$user, $token] = $this->loginUser->execute($credentials['email'], $credentials['password']);
        if (! $user) {
            throw ValidationException::withMessages([
                'email' => ['Las credenciales proporcionadas no son válidas.'],
            ]);
        }
        return response()->json(['token' => $token], 200);
    }

    public function logout(Request $request)
    {
        // Revoca el token actual del usuario autenticado
        $token = $request->user()->currentAccessToken();
        if ($token) {
            $this->logoutUser->execute($token->id);
        }
        return response()->json(['message' => 'Sesión cerrada'], 200);
    }

    public function me(Request $request)
    {
        // Obtiene el usuario autenticado desde la capa Application
        $auth = $request->user();
        $user = $this->getAuthenticatedUser->execute($auth->id);
        return response()->json([
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
        ], 200);
    }
}