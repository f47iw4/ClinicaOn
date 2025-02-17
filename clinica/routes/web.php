<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\AuthController;


// Ruta de búsqueda de la lupa
Route::get('/search', [SearchController::class, 'search'])->name('search');


//si acierta el login se dirige a la página de index 
Route::get('/admin', function () {
    return view('admin.index'); // Laravel busca resources/views/admin/index.blade.php
})->name('admin.index');

/* Ruta principal*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de recursos
Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadController::class);

// Ruta para la búsqueda
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Rutas para ESPECIALIDADES
Route::get('/admin/especialidades/crear', [EspecialidadController::class, 'create'])->name('admin.especialidades.create');
Route::post('/admin/especialidades', [EspecialidadController::class, 'store'])->name('especialidades.store');
// Ruta para los médicos asociados a una especialidad
Route::get('/especialidades/{id}/medicos', [EspecialidadController::class, 'medicos'])->name('especialidades.medicos');
// Ruta para mostrar el formulario de edición de especialidad
Route::get('/especialidades/{id}/editar', [EspecialidadController::class, 'edit'])->name('especialidades.edit');
// Ruta para actualizar la especialidad, usando método put
Route::put('/especialidades/{id}', [EspecialidadController::class, 'update'])->name('especialidades.update');

// Rutas para MÉDICOS
Route::get('/admin/medicos/crear', [MedicoController::class, 'create'])->name('admin.medicos.create');
Route::post('/admin/medicos', [MedicoController::class, 'store'])->name('medicos.store');
//update de medicos 
Route::get('medicos/{id}/edit', [MedicoController::class, 'edit'])->name('medicos.edit');
Route::put('medicos/{id}', [MedicoController::class, 'update'])->name('medicos.update');

//Rutas de la vista del ADMINISTRADOR
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');
// Rutas de administración de médicos
Route::get('/admin/medicos', [MedicoController::class, 'adminIndex'])->name('admin.medicos');
// Rutas de administración de especialidades
Route::get('/admin/especialidades', [EspecialidadController::class, 'adminIndex'])->name('admin.especialidades');

// Rutas para LOGIN de manera segura 
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

//Ruta para el login
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Grupo de rutas protegidas con autenticación
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.dashboard');
    })->name('admin.index');

    Route::get('/admin/especialidades', [EspecialidadController::class, 'index'])->name('especialidades.index');
    Route::get('/admin/medicos', [EspecialidadController::class, 'index'])->name('especialidades.index');
});