<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\SearchController;

// Ruta de búsqueda de la lupa
Route::get('/search', [SearchController::class, 'search'])->name('search');

/* Ruta principal he tenido que añadir el nombre porque si no Laravel no lo encuetra */
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de recursos
Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadController::class);

// Ruta para la búsqueda
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Ruta para los médicos asociados a una especialidad
Route::get('/especialidades/{id}/medicos', [EspecialidadController::class, 'medicos'])->name('especialidades.medicos');

//Rutas de la vista del administrador
Route::get('/admin', function () {
    return view('admin.index');
})->name('admin.index');
// Rutas de administración de médicos
Route::get('/admin/medicos', [MedicoController::class, 'adminIndex'])->name('admin.medicos');
// Rutas de administración de especialidades
Route::get('/admin/especialidades', [EspecialidadController::class, 'adminIndex'])->name('admin.especialidades');

// Rutas para Especialidades
Route::get('/admin/especialidades/crear', [EspecialidadController::class, 'create'])->name('admin.especialidades.create');
Route::post('/admin/especialidades', [EspecialidadController::class, 'store'])->name('especialidades.store');

// Rutas para Médicos
Route::get('/admin/medicos/crear', [MedicoController::class, 'create'])->name('admin.medicos.create');
Route::post('/admin/medicos', [MedicoController::class, 'store'])->name('medicos.store');
