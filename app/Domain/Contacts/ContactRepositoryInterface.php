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
     /** Marca como respondido. */
    public function markAsArchived(int $id): void;
    /** Obtiene información del navegador. */
    public function getBrowserInfoAttribute(int $id): string;
    /** Obtiene texto del estado. */
    public function getStatusTextAttribute(int $id): string;
    /** Obtiene tiempo transcurrido desde la creación. */
    public function getTimeAgoAttribute(int $id): string;
    /** Verifica si el contacto fue leído. */
    public function isRead(int $id): bool;
    /** Verifica si el contacto fue respondido. */
    public function isReplied(int $id): bool;
    /** Verifica si el contacto es nuevo. */
    public function isNew(int $id): bool;


}


