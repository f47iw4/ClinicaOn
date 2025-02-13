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


Route::get('/', function () {
    return view('welcome');
});

Route::get('/especialidades', function () {
    return view('especialidades.index');
});

Route::get('/medicos', function () {
    return view('medicos.index');
});

Route::get('/especialidades/{id}/medicos', [EspecialidadController::class, 'medicos'])->name('especialidades.medicos');
