<?php

namespace App\Application\Users;

use App\Domain\Users\UserRepositoryInterface;
use App\Domain\Auth\TokenServiceInterface;
use App\Domain\Users\Entities\User as DomainUser;

/**
 * Caso de uso: registro de usuario.
 *
 * Crea el usuario en el repositorio y emite un token inicial.
 */
class RegisterUser
{
    public function __construct(
        private readonly UserRepositoryInterface $users,
        private readonly TokenServiceInterface $tokens,
    ) {}

    /** Retorna [User, token] tras registrar. */
    public function execute(string $name, string $email, string $password): array
    {
        $user = $this->users->create($name, $email, $password);
        $token = $this->tokens->issueToken($user);
        return [$user, $token];
    }
}