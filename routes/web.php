<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para la gestión de usuarios
Route::resource('usuarios', UsuarioController::class);