<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembresiasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;

// 1. Página Pública
Route::get('/', function () {
    return view('pagina-principal');
});

// 2. Autenticación (Login / Registro / Logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// 3. Rutas Protegidas (Solo usuarios con sesión iniciada)
Route::middleware('auth')->group(function () {

    // Paneles según el rol del usuario
    Route::get('/admin/dashboard', function () {
        return view('dashboards.superadmin');
    })->name('admin.dashboard');

    Route::get('/gestion', function () {
        return view('dashboards.administrativo');
    })->name('panel.gestion');

    Route::get('/cliente/mi-cuenta', function () {
        return view('dashboards.cliente');
    })->name('cliente.dashboard');

    // Gestión de Recursos (Aislados dentro de la sesión)
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('membresias', MembresiasController::class);

});