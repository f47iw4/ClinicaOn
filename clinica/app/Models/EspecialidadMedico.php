<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EspecialidadMedico extends Model
{
    protected $table = 'especialidad_medico';

    // No es necesario especificar fillable porque solo estamos usando este modelo para gestionar la relación.
}
