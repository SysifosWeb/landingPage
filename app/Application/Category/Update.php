<?php

namespace App\Application\Category;

use App\Domain\Categories\CategoryRepositoryInterface;


Class Update
{
    public function __construct(
        private readonly CategoryRepositoryInterface $categories,
    ) {}

    public function execute(int $id, array $data): bool
    {
        return $this->categories->update($id, $data);
    }
}