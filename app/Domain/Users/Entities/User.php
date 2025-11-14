<?php

namespace App\Domain\Users\Entities;

/**
 * Entidad de dominio User.
 *
 * Representa los datos esenciales del usuario dentro del dominio,
 * independiente de la persistencia (Eloquent) y del transporte (HTTP).
 *
 * Mantener esta entidad simple permite que la capa Application orqueste
 * reglas de negocio sin acoplarse a detalles de infraestructura.
 */
class User
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
    ) {}
}