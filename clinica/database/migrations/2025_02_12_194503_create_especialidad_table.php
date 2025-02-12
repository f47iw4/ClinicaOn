<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('especialidad', function (Blueprint $table) {
            $table->id(); // Crea una columna 'id' con incremento automático
            $table->string('nombre'); // Columna 'nombre' tipo string
            $table->text('descripcion')->nullable(); // Columna 'descripcion' tipo texto, puede ser nula
            $table->timestamps(); // Crea las columnas 'created_at' y 'updated_at'
        });
    }

    /*/
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('especialidad');
    }
};
