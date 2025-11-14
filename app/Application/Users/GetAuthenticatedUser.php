<?php

namespace App\Application\Users;

use App\Domain\Users\UserRepositoryInterface;
use App\Domain\Users\Entities\User as DomainUser;

/**
 * Caso de uso: obtener el usuario autenticado.
 *
 * Lee el usuario actual desde el repositorio mediante su id.
 */
class GetAuthenticatedUser
{
    public function __construct(private readonly UserRepositoryInterface $users) {}

    /** Devuelve la entidad de dominio o null si no existe. */
    public function execute(int $id): ?DomainUser
    {
        return $this->users->getById($id);
    }
}