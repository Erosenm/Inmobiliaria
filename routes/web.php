<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembresiasController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\AsistenciaController;
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
    Route::get('/administrador/dashboard', [DashboardController::class, 'administrador'])->name('administrador.dashboard');
    Route::get('/recepcionista/dashboard', [DashboardController::class, 'recepcionista'])->name('recepcionista.dashboard');
    Route::get('/cliente/mi-cuenta', [DashboardController::class, 'cliente'])->name('cliente.dashboard');

    Route::resource('usuarios', UsuarioController::class);
    Route::resource('membresias', MembresiasController::class);
    Route::resource('asistencias', AsistenciaController::class);

});
Route::middleware('auth')->group(function () {
    // ... lo que ya tenías ...
    Route::resource('usuarios', UsuarioController::class);
    Route::resource('membresias', MembresiasController::class);
    Route::get('/pagos', [PagoController::class, 'index'])->name('pagos.index');
    Route::get('/asistencias', [AsistenciaController::class, 'index'])->name('asistencias.index');
});