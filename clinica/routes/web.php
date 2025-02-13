<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadController::class);
/* ruta para mostrar especialidades */
Route::get('/especialidades/{id}', [EspecialidadController::class, 'show'])->name('especialidades.show');
/* para el index de medicos */
Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
/* para mostrar más detalles de ese index medicos */
Route::get('/medicos/{id}', [MedicoController::class, 'show'])->name('medicos.show');
