<?php

namespace App\Application\Contacts;

use App\Domain\Contacts\ContactRepositoryInterface;

Class GetBrowserInfoAttribute
{
    public function __construct(
        private ContactRepositoryInterface $contactRepository,
    ) {}
    
    public function execute(int $id): string
    {
        return $this->contactRepository->getBrowserInfoAttribute($id);       
    }
}