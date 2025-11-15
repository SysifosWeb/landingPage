<?php

namespace App\Domain\Contacts;

use App\Domain\Contacts\Entities\Contact;

/**
 * Contrato de repositorio de contactos.
 *
 * Define operaciones necesarias para el dominio sin exponer detalles
 * de persistencia. Implementaciones concretas viven en Infrastructure
 * (por ejemplo, EloquentContactRepository).
 */
interface ContactRepositoryInterface
{
    /** Crea un contacto y devuelve la entidad de dominio. */
    public function create(array $data): Contact;
    /** Busca por id (o null si no existe). */
    public function getById(int $id): ?Contact;
    /** Obtiene todos los contactos. */
    public function getAll(): array;
    /** Marca como leído. */
    public function markAsRead(int $id): void;
    /** Marca como respondido. */
    public function markAsReplied(int $id): void;
    /** Verifica si el correo electrónico es válido.*/
    public function hasValidEmail(string $email): bool;
    /** Obtiene información del navegador. */
    public function getBrowserInfoAttribute(): string;
    /** Obtiene texto del estado. */
    public function getStatusTextAttribute(): string;
    /** Verifica si el contacto fue leído. */
    public function isRead(): bool;
    /** Verifica si el contacto fue respondido. */
    public function isReplied(): bool;
    /** Obtiene tiempo transcurrido desde la creación. */
    public function getTimeAgoAttribute(): string;
    /** Verifica si el contacto es nuevo. */
    public function isNew(): bool;


}


