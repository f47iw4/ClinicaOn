<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicoTable extends Migration
{
    public function up()
    {
        Schema::create('medico', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' con incremento automático
            $table->string('n_colegiado'); // Columna 'n_colegiado' tipo string
            $table->string('nombre'); // Columna 'nombre' tipo string
            $table->string('apellidos'); // Columna 'apellidos' tipo string
            $table->string('email')->unique(); // Columna 'email' único
            $table->string('contrasenia'); // Columna 'contrasenia' tipo string
            $table->string('telefono')->nullable(); // Columna 'telefono' puede ser nula
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
            $table->softDeletes(); // Para manejar eliminación suave (campo 'deleted_at')
        });
    }

    public function down()
    {
        Schema::dropIfExists('medico');
    }
}
