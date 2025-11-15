<?php

namespace App\Application\Auth;

use App\Domain\Auth\TokenServiceInterface;
use App\Domain\Users\Entities\User as DomainUser;

/**
 * Caso de uso: autorización mediante token.
 *
 * Normaliza un header "Bearer ..." o token plano y resuelve
 * el usuario asociado. Devuelve null si no está autorizado.
 */
class AuthorizeUser
{
    public function __construct(private readonly TokenServiceInterface $tokens) {}

    /** Devuelve el usuario de dominio si el token es válido; null en caso contrario. */
    public function execute(string $bearerOrToken): ?DomainUser
    {
        $token = $this->normalizeToken($bearerOrToken);
        return $this->tokens->getUserFromToken($token);
    }

    private function normalizeToken(string $value): string
    {
        return str_starts_with($value, 'Bearer ') ? substr($value, 7) : $value;
    }
}