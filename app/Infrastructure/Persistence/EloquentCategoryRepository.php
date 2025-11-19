<?php
namespace App\Infrastructure\Persistence;

use App\Domain\Categories\CategoryRepositoryInterface;
use App\Domain\Categories\Entities\Category as DomainCategory;
use App\Models\Category as EloquentCategory;

Class EloquentCategoryRepository implements CategoryRepositoryInterface
{   
    private function toDomain(EloquentCategory $model): DomainCategory
    {
        try {
            return new DomainCategory( 
                id: $model->id,
                name: $model->name,
                slug: $model->slug,
                description: $model->description,
                color: $model->color,
                active: $model->active,
                sort_order: $model->sort_order,
            );
        } catch (\Exception $e) {
            throw new \Exception('Error mapping category model to domain entity: ' . $e->getMessage());
        }
    }
    public function create(array $data): DomainCategory
    {
        $model = new EloquentCategory();
        try {                        
            $model->name = $data['name'];
            $model->slug = $data['slug'];
            $model->description = $data['description'];
            $model->color = $data['color'];
            $model->active = $data['active'];
            $model->sort_order = $data['sort_order'];
            $model->save();
            return $this->toDomain($model);
        } catch (\Exception $e) {
            throw new \Exception('Error creating category: ' . $e->getMessage());
        }
    }
    /** Busca por id (o null si no existe). */
    public function getById(int $id): ?DomainCategory
    {
        try {
            $model = EloquentCategory::find($id);
            return $model ? $this->toDomain($model) : null;
        } catch (\Exception $e) {
            throw new \Exception('Error finding category by id: ' . $e->getMessage());
        }
    }
    /** Obtiene todos los contactos. */
    public function getAll(): array
    {
        try {
            $models = EloquentCategory::all();
            return $models->map(fn($model) => $this->toDomain($model))->toArray();
        } catch (\Exception $e) {
            throw new \Exception('Error finding all categories: ' . $e->getMessage());
        }
    }
    public function update(int $id, array $data): bool
    {
        try {
            $model = EloquentCategory::find($id);
            if (!$model) {
                return false;
            }
            $model->update($data);
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Error updating category: ' . $e->getMessage());
        }
    }
    public function toggleActive(int $id): bool
    {
        try {
            $model = EloquentCategory::find($id);
            if (!$model) {
                return false;
            }
            $model->active = !$model->active;
            $model->save();
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Error toggling active status: ' . $e->getMessage());
        }
    }
    /** Elimina por id (o null si no existe). */
    public function delete(int $id): bool
    {
        try {
            $model = EloquentCategory::find($id);
             if ($model->blogPosts()->exists()) {
                return false;
            }           
            $model->delete();
            return true;
        } catch (\Exception $e) {
            throw new \Exception('Error eliminando una categoria: ' . $e->getMessage());
        }
    }
}




?>