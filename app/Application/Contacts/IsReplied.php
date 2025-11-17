<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;

Class IsReplied
{
    public function __construct(
        private readonly ContactRepositoryInterface $contactRepository,
    ) {}
    
    public function execute(int $id): bool
    {
        return $this->contactRepository->isReplied($id);
    }
}