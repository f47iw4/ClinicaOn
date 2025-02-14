<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    // Si el nombre de la tabla no coincide con el plural del modelo, puedes especificarlo
    protected $table = 'especialidad';

    // Definir las columnas que se pueden asignar masivamente
    protected $fillable = ['nombre', 'descripcion'];

    // Relación con el modelo Médico
    public function medicos()
    {
        /* se pone hasMany para que sea relación 1:N */
        /* ultimo cambio he quitado especialidad_medico e id_medico*/
        return $this->hasMany(Medico::class,'id_especialidad', 'id');
    }

}
