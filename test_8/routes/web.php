<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\PermisoController;
use App\Http\Controllers\ItemMenuController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController; // Añadido para referenciar el controlador de autenticación
use Illuminate\Support\Facades\Auth;

// Rutas de autenticación generadas por Auth::routes()
Auth::routes();

// Ruta de bienvenida
Route::get('/', function () {
    return view('home.index');
});

// Ruta de inicio protegida por autenticación
Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');

// Rutas para Usuarios
Route::prefix('usuarios')->middleware('auth')->group(function () {
    Route::get('/', [UsuarioController::class, 'index'])->name('usuarios.index');
    Route::get('/create', [UsuarioController::class, 'create'])->name('usuarios.create');
    Route::post('/store', [UsuarioController::class, 'store'])->name('usuarios.store');
    Route::get('/{usuario}', [UsuarioController::class, 'show'])->name('usuarios.show');
    Route::get('/{usuario}/edit', [UsuarioController::class, 'edit'])->name('usuarios.edit');
    Route::put('/{usuario}/update', [UsuarioController::class, 'update'])->name('usuarios.update');
    Route::delete('/{usuario}/delete', [UsuarioController::class, 'destroy'])->name('usuarios.destroy');
});

// Rutas para Perfiles
Route::prefix('perfiles')->middleware('auth')->group(function () {
    Route::get('/', [PerfilController::class, 'index'])->name('perfiles.index');
    Route::get('/create', [PerfilController::class, 'create'])->name('perfiles.create');
    Route::post('/store', [PerfilController::class, 'store'])->name('perfiles.store');
    Route::get('/{perfil}', [PerfilController::class, 'show'])->name('perfiles.show');
    Route::get('/{perfil}/edit', [PerfilController::class, 'edit'])->name('perfiles.edit');
    Route::put('/{perfil}/update', [PerfilController::class, 'update'])->name('perfiles.update');
    Route::delete('/{perfil}/delete', [PerfilController::class, 'destroy'])->name('perfiles.destroy');
});

// Rutas para Menus
Route::resource('menus', MenuController::class)->middleware('auth');

// Rutas para Items de Menú
Route::resource('menu-items', ItemMenuController::class)->middleware('auth');

// Rutas para Permisos
Route::resource('permisos', PermisoController::class)->middleware('auth');

// Rutas para Productos (protegidas por autenticación y roles)
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('productos', ProductoController::class);
});

// Rutas para el Dashboard de Administrador
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [HomeController::class, 'adminDashboard'])->name('admin.dashboard');
});

// Rutas para el Dashboard de Vendedor
Route::middleware(['auth', 'role:vendedor'])->group(function () {
    Route::get('/vendedor', [HomeController::class, 'vendedorDashboard'])->name('vendedor.dashboard');
});

// Rutas de autenticación personalizadas
Route::prefix('auth')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    // Puedes añadir otras rutas de autenticación aquí si es necesario
});

// Otras rutas personalizadas que puedas
