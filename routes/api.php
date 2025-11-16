<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ContactController;

// Auth endpoints
Route::post('/auth/register', [AuthController::class, 'register']);
Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/auth/me', [AuthController::class, 'me'])->middleware('auth:sanctum');

// Contact endpoints
Route::post('/contact/register', [ContactController::class, 'registerContact'])->middleware('auth:sanctum');
Route::get('/contact/{id}', [ContactController::class, 'getById'])->middleware('auth:sanctum');
Route::get('/contact', [ContactController::class, 'getAll'])->middleware('auth:sanctum');
Route::put('/contact/{id}/mark-as-read', [ContactController::class, 'markAsRead'])->middleware('auth:sanctum');