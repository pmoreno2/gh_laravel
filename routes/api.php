<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LibroController;
use App\Http\Controllers\Api\PrestamoController;
use App\Http\Controllers\Api\AutorController;
use App\Http\Controllers\Api\ReservaController;
use App\Http\Controllers\Api\UsuarioController;


Route::middleware(['api'])->group(function () {
    Route::get('/example', function () {
        return response()->json(['message' => 'API is working']);
    });
    // Endpoints para visualizar recursos
    Route::get('usuarios', [UsuarioController::class, 'index']);
    Route::get('libros', [LibroController::class, 'index']);
    Route::get('autores', [AutorController::class, 'index']);
    Route::get('prestamos', [PrestamoController::class, 'index']);
    Route::get('reservas', [ReservaController::class, 'index']);
    // Endpoints para crear recursos
    Route::post('usuarios', [UsuarioController::class, 'store']);
    Route::post('libros', [LibroController::class, 'store']);
    Route::post('autores', [AutorController::class, 'store']);
    Route::post('prestamos', [PrestamoController::class, 'store']);
    Route::post('reservas', [ReservaController::class, 'store']);
    // Endpoints para ver un recurso especifico
    Route::get('usuarios/{id}', [UsuarioController::class, 'show']);
    Route::get('libros/{id}', [LibroController::class, 'show']);
    Route::get('autores/{id}', [AutorController::class, 'show']);
    Route::get('prestamos/{id}', [PrestamoController::class, 'show']);
    Route::get('reservas/{id}', [ReservaController::class, 'show']);
});