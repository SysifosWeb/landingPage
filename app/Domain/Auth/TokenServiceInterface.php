<?php

namespace App\Domain\Auth;

use App\Domain\Users\Entities\User;

/**
 * Servicio de emisión y revocación de tokens.
 *
 * La interfaz permite cambiar el mecanismo (Sanctum, JWT, etc.)
 * sin afectar el dominio ni los casos de uso.
 */
interface TokenServiceInterface
{
    /** Emite un token de acceso para el usuario. */
    public function issueToken(User $user, string $name = 'api'): string;
    /** Revoca el token por id. */
    public function revokeTokenById(int $tokenId): void;
}