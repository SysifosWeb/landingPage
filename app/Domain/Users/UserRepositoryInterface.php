<?php

namespace App\Domain\Users;

use App\Domain\Users\Entities\User;

/**
 * Contrato de repositorio de usuarios.
 *
 * Define operaciones necesarias para el dominio sin exponer detalles
 * de persistencia. Implementaciones concretas viven en Infrastructure
 * (por ejemplo, EloquentUserRepository).
 */
interface UserRepositoryInterface
{
    /** Crea un usuario y devuelve la entidad de dominio. */
    public function create(string $name, string $email, string $passwordPlain): User;
    /** Busca por email (o null si no existe). */
    public function findByEmail(string $email): ?User;
    /** Obtiene por id (o null si no existe). */
    public function getById(int $id): ?User;
    /** Intenta login validando credenciales y devuelve usuario (o null). */
    public function attemptLogin(string $email, string $passwordPlain): ?User;
}