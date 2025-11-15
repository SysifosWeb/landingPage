<?php
namespace App\Domain\Contacts\Entities;

/**
 * Entidad de dominio Contact.
 *
 * Representa los datos esenciales del contacto dentro del dominio,
 * independiente de la persistencia (Eloquent) y del transporte (HTTP).
 *
 * Mantener esta entidad simple permite que la capa Application orqueste
 * reglas de negocio sin acoplarse a detalles de infraestructura.
 */
class Contact
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
        public readonly string $phone,
        public readonly string $company,
        public readonly string $subject,
        public readonly string $message,
        public readonly string $status,
        public readonly string $ip_address,
        public readonly string $user_agent,
        public readonly array $metadata,
        public readonly string $read_at,
        public readonly string $replied_at,        
    ) {}
}


?>