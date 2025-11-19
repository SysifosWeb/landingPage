<?php

namespace App\Application\Category;

use App\Domain\Categories\CategoryRepositoryInterface;


Class Delete
{
    public function __construct(
        private readonly CategoryRepositoryInterface $categories,
    ) {}

    public function execute(int $id): bool
    {
        return $this->categories->delete($id);
    }
}
