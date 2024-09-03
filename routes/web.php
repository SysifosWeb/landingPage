<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return inertia('Home/Home');
});

Route::get('/nosotros', function () {
    return inertia('Nosotros/Nosotros');
});

Route::get('/servicios', function () {
    return inertia('Servicios/Servicios');
});

Route::get('/portafolio', function () {
    return inertia('Portafolio/Portafolio');
});

Route::get('/blog', function () {
    return inertia('Blog/Blog');
});

Route::get('/contacto', function () {
    return inertia('Contacto/Contacto');
});

