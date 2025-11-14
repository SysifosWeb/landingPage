<?php

namespace App\Infrastructure\Persistence;

use App\Domain\Users\UserRepositoryInterface;
use App\Domain\Users\Entities\User as DomainUser;
use App\Models\User as EloquentUser;
use Illuminate\Support\Facades\Hash;

/**
 * Implementación concreta del repositorio usando Eloquent.
 *
 * Traduce modelos de Eloquent a entidades de dominio y encapsula
 * detalles de persistencia (consultas, hashing, etc.).
 */
class EloquentUserRepository implements UserRepositoryInterface
{
    /** Mapea un modelo Eloquent a la entidad de dominio. */
    private function toDomain(EloquentUser $model): DomainUser
    {
        return new DomainUser(
            id: $model->id,
            name: $model->name,
            email: $model->email,
        );
    }

    /** Crea un usuario persistiendo con Eloquent y devuelve la entidad. */
    public function create(string $name, string $email, string $passwordPlain): DomainUser
    {
        $model = new EloquentUser();
        $model->name = $name;
        $model->email = $email;
        $model->password = $passwordPlain; // cast 'hashed' en el modelo
        $model->save();
        return $this->toDomain($model);
    }

    /** Busca por email y retorna entidad (o null). */
    public function findByEmail(string $email): ?DomainUser
    {
        $model = EloquentUser::where('email', $email)->first();
        return $model ? $this->toDomain($model) : null;
    }

    /** Obtiene por id y retorna entidad (o null). */
    public function getById(int $id): ?DomainUser
    {
        $model = EloquentUser::find($id);
        return $model ? $this->toDomain($model) : null;
    }

    /** Verifica credenciales con Hash y retorna entidad (o null). */
    public function attemptLogin(string $email, string $passwordPlain): ?DomainUser
    {
        $model = EloquentUser::where('email', $email)->first();
        if (! $model || ! Hash::check($passwordPlain, $model->password)) {
            return null;
        }
        return $this->toDomain($model);
    }
}