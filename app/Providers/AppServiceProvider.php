<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Domain\Users\UserRepositoryInterface;
use App\Infrastructure\Persistence\EloquentUserRepository;
use App\Domain\Auth\TokenServiceInterface;
use App\Infrastructure\Auth\SanctumTokenService;
use App\Domain\Contacts\ContactRepositoryInterface;
use App\Infrastructure\Persistence\EloquentContactRepository;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Registro de servicios y bindings del contenedor IoC.
     *
     * Aquí enlazamos interfaces del dominio con implementaciones de
     * infraestructura para aplicar inversión de dependencias:
     * - `UserRepositoryInterface` → `EloquentUserRepository`
     * - `TokenServiceInterface` → `SanctumTokenService`
     *
     * Esto permite que los casos de uso (Application) dependan de
     * abstracciones y no de detalles concretos, facilitando pruebas
     * y sustitución futura (por ejemplo, otro ORM o proveedor de tokens).
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, EloquentUserRepository::class);
        $this->app->bind(TokenServiceInterface::class, SanctumTokenService::class);
        $this->app->bind(ContactRepositoryInterface::class, EloquentContactRepository::class);
    }

    /**
     * Inicialización de servicios de la aplicación.
     *
     * Libre para hooks de arranque (listeners, macros, etc.).
     */
    public function boot(): void
    {
        //
    }
}
