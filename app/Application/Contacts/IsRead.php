<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;

Class IsRead
{
    public function __construct(
        private readonly ContactRepositoryInterface $contactRepository,
    ) {}
    
    public function execute(int $id): bool
    {
        return $this->contactRepository->isRead($id);
    }
}