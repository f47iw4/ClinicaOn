<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    // Si el nombre de la tabla no coincide con el plural del modelo, puedes especificarlo
    protected $table = 'medico';

    // Definir las columnas que se pueden asignar masivamente
    protected $fillable = ['n_colegiado', 'nombre', 'apellidos', 'email', 'contrasenia', 'telefono'];

    // Relación con el modelo Especialidad
    public function especialidades()
    {
        /* para que sea 1:N se pone belongsTo */
        return $this->belongsTo(Especialidad::class, 'especialidad_medico', 'id_medico', 'id_especialidad');
    }
}

