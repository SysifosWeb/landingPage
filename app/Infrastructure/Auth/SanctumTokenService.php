<?php

namespace App\Infrastructure\Auth;

use App\Domain\Auth\TokenServiceInterface;
use App\Domain\Users\Entities\User as DomainUser;
use App\Models\User as EloquentUser;
use Laravel\Sanctum\PersonalAccessToken;

/**
 * Implementación del servicio de tokens usando Laravel Sanctum.
 *
 * Aísla la emisión y revocación de tokens del resto de la aplicación,
 * permitiendo sustituir Sanctum por otro proveedor sin tocar el dominio.
 */
class SanctumTokenService implements TokenServiceInterface
{
    /** Emite un token (string plano) para el usuario dado. */
    public function issueToken(DomainUser $user, string $name = 'api'): string
    {
        $eloquent = EloquentUser::findOrFail($user->id);
        return $eloquent->createToken($name)->plainTextToken;
    }

    /** Revoca el token por id directamente en la tabla de Sanctum. */
    public function revokeTokenById(int $tokenId): void
    {
        // Laravel Sanctum usa tabla personal_access_tokens
        PersonalAccessToken::where('id', $tokenId)->delete();
    }

    /** Obtiene el usuario de dominio asociado a un token (texto plano). */
    public function getUserFromToken(string $plainTextToken): ?DomainUser
    {
        $pat = PersonalAccessToken::findToken($plainTextToken);
        if (! $pat) {
            return null;
        }
        $tokenable = $pat->tokenable;
        if (! $tokenable instanceof EloquentUser) {
            return null;
        }
        return new DomainUser(
            id: $tokenable->id,
            name: $tokenable->name,
            email: $tokenable->email,
        );
    }
}