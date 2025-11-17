<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;

Class IsNew
{
    public function __construct(
        private readonly ContactRepositoryInterface $contactRepository,
    ) {}
    
    public function execute(int $id): bool
    {
        return $this->contactRepository->isNew($id);
    }
}