<?php

namespace App\Domain\Categories;

use App\Domain\Categories\Entities\Category;

interface CategoryRepositoryInterface
{
    // public function all(): array;
    // public function find(int $id): ?Category;
    public function create(array $data): ?Category;
    /** Busca por id (o null si no existe). */
    public function getById(int $id): ?Category;
    /** Obtiene todos los contactos. */
    public function getAll(): array;
    /** Elimina por id (o null si no existe). */
    public function delete(int $id): bool;
  
    public function update(int $id, array $data): bool;

    public function toggleActive(int $id): bool;
}