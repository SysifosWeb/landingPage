<?php

namespace App\Application\Category;

use App\Domain\Categories\CategoryRepositoryInterface;
use App\Domain\Categories\Entities\Category;

Class Create
{
    public function __construct(
        private readonly CategoryRepositoryInterface $categories,
    ) {}

    public function execute(array $data): Category
    {
        return $this->categories->create($data);
    }
}
