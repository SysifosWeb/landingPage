<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;

Class MarkAsArchived
{
    public function __construct(
        private readonly ContactRepositoryInterface $contacts,
    ) {}

    public function execute(int $id): void
    {
        $this->contacts->markAsArchived($id);
    }
}