<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;
use App\Domain\Contacts\Entities\Contact as DomainContact;

Class MarkAsRead
{
    public function __construct(
        private readonly ContactRepositoryInterface $contacts,
    ) {}

    /**
     * Ejecuta el caso de uso.
     */
    public function execute(int $id): ?DomainContact
    {
        return $this->contacts->markAsRead($id);        
    }
}