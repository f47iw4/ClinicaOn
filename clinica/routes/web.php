<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\SearchController;

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
