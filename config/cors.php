<?php

/**
 * Configuración CORS para la API.
 *
 * Permite solicitudes cross-origin hacia rutas `api/*` y el endpoint
 * de CSRF de Sanctum. En producción, conviene restringir `allowed_origins`
 * con los dominios autorizados.
 */
return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'],
    'allowed_methods' => ['*'],
    'allowed_origins' => ['*'],
    'allowed_origins_patterns' => [],
    'allowed_headers' => ['*'],
    'exposed_headers' => [],
    'max_age' => 0,
    'supports_credentials' => false,
];