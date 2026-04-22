<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\AuthController;

// Rutas PÚBLICAS (Cualquiera puede entrar a registrarse o loguearse)
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

// Rutas PROTEGIDAS (Solo usuarios con Token Sanctum)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/notes', [NoteController::class, 'index']);
    Route::post('/notes', [NoteController::class, 'store']);
    Route::delete('/notes/{id}', [NoteController::class, 'destroy']);
});