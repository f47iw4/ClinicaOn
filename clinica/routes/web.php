<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\SearchController;

/* he tenido que añadir el nombre porque si no Laravel no lo encuetra */
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Rutas de recursos
Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadController::class);

// Rutas para las vistas de especialidades y médicos
Route::get('/especialidades', function () {
    return view('especialidades.index');
});

Route::get('/medicos', function () {
    return view('medicos.index');
});

// Ruta para la búsqueda
Route::get('/search', [SearchController::class, 'search'])->name('search');

// Ruta para los médicos asociados a una especialidad
Route::get('/especialidades/{id}/medicos', [EspecialidadController::class, 'medicos'])->name('especialidades.medicos');
