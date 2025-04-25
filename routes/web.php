<?php

use App\Http\Controllers\NosotroController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\ServicioController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\PortfolioController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Home');
});
Route::resource('nosotros', NosotroController::class);
Route::resource('contactos', ContactoController::class);
Route::resource('servicios', ServicioController::class);
Route::resource('blogs', BlogController::class);
Route::resource('portfolios', PortfolioController::class);
