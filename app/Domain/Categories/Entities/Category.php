<?php

namespace App\Domain\Categories\Entities;

Class Category
{
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $slug,
        public readonly string $description,
        public readonly string $color,
        public readonly bool $active,
        public readonly int $sort_order,
    ) {}
}