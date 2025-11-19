<?php

namespace App\Application\Category;

use App\Domain\Categories\CategoryRepositoryInterface;
use App\Domain\Categories\Entities\Category;

Class GetById
{
   public function __construct(
        private readonly CategoryRepositoryInterface $categories,
    ) {}

    public function execute(int $id): ?Category
    {
        return $this->categories->getById($id);
    }
}