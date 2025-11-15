<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;
use App\Domain\Contacts\Entities\Contact as DomainContact;

/**
 * Caso de uso: registro de contacto.
 *
 * Crea el contacto en el repositorio.
 */
class RegisterContact
{
    public function __construct(
        private readonly ContactRepositoryInterface $contacts,
    ) {}    

    /**
     * Ejecuta el caso de uso.
     */
    public function execute(array $data): DomainContact
    {
        return $this->contacts->create($data);
    }
}

