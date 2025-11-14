<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Arquitectura Limpia en este proyecto

Este proyecto adopta una separación por capas para mejorar mantenibilidad y pruebas:

- **Domain**: contratos y entidades puras.
  - `app/Domain/Users/Entities/User.php`: entidad de dominio (sin Eloquent/HTTP).
  - `app/Domain/Users/UserRepositoryInterface.php`: interfaz de repositorio.
  - `app/Domain/Auth/TokenServiceInterface.php`: interfaz de servicio de tokens.
- **Application**: casos de uso que orquestan reglas de negocio.
  - `app/Application/Users/RegisterUser.php`: registra usuario y emite token.
  - `app/Application/Auth/LoginUser.php`: valida credenciales y emite token.
  - `app/Application/Auth/LogoutUser.php`: revoca token actual.
  - `app/Application/Users/GetAuthenticatedUser.php`: obtiene usuario autenticado.
- **Infrastructure**: implementaciones concretas.
  - `app/Infrastructure/Persistence/EloquentUserRepository.php`: repositorio con Eloquent.
  - `app/Infrastructure/Auth/SanctumTokenService.php`: tokens con Sanctum.
- **Interfaces (HTTP)**: controladores Laravel.
  - `app/Http/Controllers/AuthController.php`: valida requests y delega en casos de uso.
- **Contenedor IoC**: inversión de dependencias.
  - `app/Providers/AppServiceProvider.php`: vincula interfaces → implementaciones.

### Ventajas
- Casos de uso y dominio no dependen de Eloquent ni de Sanctum.
- Sustituir infraestructura (otro ORM o JWT) no impacta el dominio.
- Facilita pruebas unitarias de casos de uso con dobles (mocks/stubs).

### Cómo añadir un nuevo módulo
1. Define entidad(es) y contratos en `app/Domain/<Modulo>`.
2. Implementa repositorios/servicios en `app/Infrastructure/<...>`.
3. Crea casos de uso en `app/Application/<Modulo>`.
4. Expone endpoints con controladores en `app/Http/Controllers`.
5. Registra bindings en `AppServiceProvider`.

### Endpoints actuales (REST API con Sanctum)
- `POST /api/auth/register` → devuelve `{ user, token }`.
- `POST /api/auth/login` → devuelve `{ token }`.
- `POST /api/auth/logout` → requiere `Authorization: Bearer`.
- `GET /api/auth/me` → requiere `Authorization: Bearer`.

### Notas
- CORS está abierto en `config/cors.php` para facilitar pruebas; en producción, restringe `allowed_origins`.
- El `User` de Eloquent usa cast `hashed` para el `password`.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
