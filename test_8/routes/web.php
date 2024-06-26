<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

// Rutas de autenticación generadas por Auth::routes()
Auth::routes();

// Ruta de bienvenida
Route::get('/', function () {
    return view('home.index');
});

// Ruta de inicio protegida por autenticación
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Rutas para el Dashboard de Administrador
Route::middleware(['auth', 'role:admin'])->get('/admin', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');

// Rutas para el Dashboard de Vendedor
Route::middleware(['auth', 'role:vendedor'])->get('/vendedor', [HomeController::class, 'vendedorDashboard'])->name('vendedor.dashboard');

// Rutas de autenticación personalizadas
Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
});

// Rutas adicionales con middleware 'role'
Route::middleware(['auth', 'role:admin'])->group(function () {
    // Ejemplo de ruta adicional protegida por 'role:admin'
    Route::get('/example', function () {
        return 'Esta ruta está protegida por el middleware role:admin';
    });
});

// Ejemplo de ruta protegida por 'role:vendedor'
Route::middleware(['auth', 'role:vendedor'])->get('/vendedor-only', function () {
    return 'Esta ruta está protegida por el middleware role:vendedor';
})->name('vendedor.only');
