<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;

Class MarkAsReplied
{
    public function __construct(
        private readonly ContactRepositoryInterface $contacts,
    ) {}

    public function execute(int $id): void
    {
        $this->contacts->markAsReplied($id);       
    }
}