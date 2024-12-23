<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

Route::get('/', function () {
    return inertia('Home/Home');
});

Route::get('/nosotros', function () {
    return inertia('Nosotros/Nosotros');
});

Route::get('/servicios', function () {
    return inertia('Servicios/Servicios');
});

Route::get('/contacto', function () {
    return inertia('Contacto/Contacto');
});

Route::resource('customers', CustomerController::class);
