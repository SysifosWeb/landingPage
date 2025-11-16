<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;
use App\Domain\Contacts\Entities\Contact as DomainContact;

Class GetAll
{
    public function __construct(
        private readonly ContactRepositoryInterface $contactRepository,
    ) {}

    public function execute(): array
    {
        return $this->contactRepository->getAll();
    }
}