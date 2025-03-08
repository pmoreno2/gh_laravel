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
    // Endpoints para eliminar un recurso especifico
    Route::delete('usuarios/del/{id}', [UsuarioController::class, 'destroy']);
    Route::delete('libros/del/{id}', [LibroController::class, 'destroy']);
    Route::delete('autores/del/{id}', [AutorController::class, 'destroy']);
    Route::delete('prestamos/del/{id}', [PrestamoController::class, 'destroy']);
    Route::delete('reservas/del/{id}', [ReservaController::class, 'destroy']);

    // Endpoints para ver un recurso especifico
    Route::get('usuarios/{id}', [UsuarioController::class, 'show']);
    Route::get('libros/{id}', [LibroController::class, 'show']);
    Route::get('autores/{id}', [AutorController::class, 'show']);
    Route::get('prestamos/{id}', [PrestamoController::class, 'show']);
    Route::get('reservas/{id}', [ReservaController::class, 'show']);

    // Endpoints para modificar un recurso especifico
    Route::put('usuarios/mod/{id}', [UsuarioController::class, 'update']);
    Route::put('libros/mod/{id}', [LibroController::class, 'update']);  
    Route::put('autores/mod/{id}', [AutorController::class, 'update']);
    Route::put('prestamos/mod/{id}', [PrestamoController::class, 'update']);
    Route::put('reservas/mod/{id}', [ReservaController::class, 'update']);
});