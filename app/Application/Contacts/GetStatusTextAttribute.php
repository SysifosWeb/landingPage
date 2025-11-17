<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;

Class GetStatusTextAttribute
{
   public function __construct(
        private ContactRepositoryInterface $contactRepository,
    ) {}
    
    public function execute(int $id): string
    {
        return $this->contactRepository->getStatusTextAttribute($id);
    }
}