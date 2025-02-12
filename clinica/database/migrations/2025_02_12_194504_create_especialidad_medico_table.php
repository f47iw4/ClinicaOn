<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEspecialidadMedicoTable extends Migration
{
    public function up()
    {
        Schema::create('especialidad_medico', function (Blueprint $table) {
            $table->unsignedBigInteger('id_medico'); // Columna 'id_medico' de tipo BigInteger sin signo
            $table->unsignedBigInteger('id_especialidad'); // Columna 'id_especialidad' de tipo BigInteger sin signo
            $table->primary(['id_medico', 'id_especialidad']); // Define las dos columnas como clave primaria compuesta

            // Define las claves foráneas con la referencia a las tablas 'medico' y 'especialidad'
            $table->foreign('id_medico')->references('id')->on('medico')->onDelete('cascade');
            $table->foreign('id_especialidad')->references('id')->on('especialidad')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('especialidad_medico');
    }
}
