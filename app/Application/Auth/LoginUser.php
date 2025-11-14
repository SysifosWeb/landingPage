<?php

namespace App\Application\Auth;

use App\Domain\Users\UserRepositoryInterface;
use App\Domain\Auth\TokenServiceInterface;
use App\Domain\Users\Entities\User as DomainUser;

/**
 * Caso de uso: login de usuario.
 *
 * Orquesta el intento de autenticación en el repositorio y la
 * emisión de un token en el servicio de tokens.
 */
class LoginUser
{
    public function __construct(
        private readonly UserRepositoryInterface $users,
        private readonly TokenServiceInterface $tokens,
    ) {}

    /** Retorna [User|null, token|null] según credenciales. */
    public function execute(string $email, string $password): array
    {
        $user = $this->users->attemptLogin($email, $password);
        if (! $user) {
            return [null, null];
        }
        $token = $this->tokens->issueToken($user);
        return [$user, $token];
    }
}