<?php

namespace App\Application\Category;

use App\Domain\Categories\CategoryRepositoryInterface;
use App\Domain\Categories\Entities\Category;

Class GetAll
{
   public function __construct(
        private readonly CategoryRepositoryInterface $categories,
    ) {}

    public function execute(): array
    {
        return $this->categories->getAll();
    }
}