<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicoController;
use App\Http\Controllers\EspecialidadController;

/* he tenido que añadir el nombre porque si no Laravel no lo encuetra */
Route::get('/', function () {
    return view('welcome');
})->name('home');;

Route::resource('medicos', MedicoController::class);
Route::resource('especialidades', EspecialidadController::class);
/* ruta para mostrar especialidades */
/* Route::get('/especialidades/{id}', [EspecialidadController::class, 'show'])->name('especialidades.show');
 *//* para el index de medicos */
/* Route::get('/medicos', [MedicoController::class, 'index'])->name('medicos.index');
 *//* para mostrar más detalles de ese index medicos */
/* Route::get('/medicos/{id}', [MedicoController::class, 'show'])->name('medicos.show');
/*Route::get('/especialidades', [EspecialidadController::class, 'index'])->name('especialidades.index');
 */
Route::get('/especialidades/{id}/medicos', [EspecialidadController::class, 'medicos'])->name('especialidades.medicos');
