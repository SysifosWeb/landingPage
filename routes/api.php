<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CategoryController;

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
Route::put('/contact/{id}/mark-as-replied', [ContactController::class, 'markAsReplied'])->middleware('auth:sanctum');
Route::get('/contact/{id}/browser-info', [ContactController::class, 'getBrowserInfoAttribute'])->middleware('auth:sanctum');
Route::get('/contact/{id}/status-text', [ContactController::class, 'getStatusTextAttribute'])->middleware('auth:sanctum');
Route::get('/contact/{id}/time-ago', [ContactController::class, 'getTimeAgoAttribute'])->middleware('auth:sanctum');
Route::get('/contact/{id}/is-new', [ContactController::class, 'isNew'])->middleware('auth:sanctum');
Route::get('/contact/{id}/is-read', [ContactController::class, 'isRead'])->middleware('auth:sanctum');
Route::get('/contact/{id}/is-replied', [ContactController::class, 'isReplied'])->middleware('auth:sanctum');
Route::put('/contact/{id}/mark-as-archived', [ContactController::class, 'markAsArchived'])->middleware('auth:sanctum');

// Category endpoints
Route::post('/category/create', [CategoryController::class, 'create'])->middleware('auth:sanctum');
Route::get('/category/{id}', [CategoryController::class, 'getById'])->middleware('auth:sanctum');
Route::get('/category', [CategoryController::class, 'getAll'])->middleware('auth:sanctum');
Route::put('/category/{id}/update', [CategoryController::class, 'update'])->middleware('auth:sanctum');
Route::delete('/category/{id}/delete', [CategoryController::class, 'delete'])->middleware('auth:sanctum');
Route::put('/category/{id}/toggle-active', [CategoryController::class, 'toggleActive'])->middleware('auth:sanctum');
