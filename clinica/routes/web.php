<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;

// Ruta de búsqueda
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Rutas de login y logout
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Ruta principal (solo accesible si está logueado)
Route::middleware(['auth'])->group(function () {
    // Ruta principal del admin
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin.index');

    // Rutas de administración de médicos
    Route::get('/admin/medicos', [MedicoController::class, 'adminIndex'])->name('admin.medicos');
    Route::get('/admin/medicos/crear', [MedicoController::class, 'create'])->name('admin.medicos.create');
    Route::post('/admin/medicos', [MedicoController::class, 'store'])->name('medicos.store');
    Route::get('medicos/{id}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');
    Route::put('medicos/{id}', [MedicoController::class, 'update'])->name('medicos.update');

    // Rutas de administración de especialidades
    Route::get('/admin/especialidades', [EspecialidadController::class, 'adminIndex'])->name('admin.especialidades');
    Route::get('/admin/especialidades/crear', [EspecialidadController::class, 'create'])->name('admin.especialidades.create');
    Route::post('/admin/especialidades', [EspecialidadController::class, 'store'])->name('especialidades.store');
    Route::get('/especialidades/{id}/editar', [EspecialidadController::class, 'edit'])->name('especialidades.edit');
    Route::put('/especialidades/{id}', [EspecialidadController::class, 'update'])->name('especialidades.update');
});

// Ruta para los médicos asociados a una especialidad
Route::get('/especialidades/{id}/medicos', [EspecialidadController::class, 'medicos'])->name('especialidades.medicos');

// Ruta principal de bienvenida
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de recursos (para médicos y especialidades)
Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadController::class);
