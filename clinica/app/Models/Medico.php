<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Medico extends Model
{
    // Si el nombre de la tabla no coincide con el plural del modelo, puedes especificarlo
    protected $table = 'medico';

    // Definir las columnas que se pueden asignar masivamente
    protected $fillable = ['n_colegiado', 'nombre', 'apellidos', 'email', 'contrasenia', 'telefono', 'id_especialidad', 'foto'];

    // Relación con el modelo Especialidad
    public function especialidades(){
        /* para que sea 1:N se pone belongsTo */
        /* ultimos cambios: he eliminado especialidad_medico*/
        return $this->belongsTo(Especialidad::class,'id_especialidad', 'id');
    }
     // Método para obtener la imagen en formato base64
     public function getFotoUrlAttribute()
     {
         return $this->foto ? 'data:image/jpeg;base64,' . base64_encode($this->foto) : asset('imagenes/default-profile.png');
     }
}



