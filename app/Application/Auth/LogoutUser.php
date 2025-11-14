<?php

namespace App\Application\Auth;

use App\Domain\Auth\TokenServiceInterface;

/**
 * Caso de uso: cierre de sesión.
 *
 * Delegado en el servicio de tokens para revocar el token actual.
 */
class LogoutUser
{
    public function __construct(private readonly TokenServiceInterface $tokens) {}

    /** Revoca el token por su id. */
    public function execute(int $tokenId): void
    {
        $this->tokens->revokeTokenById($tokenId);
    }
}