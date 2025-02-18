<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('especialidad', function (Blueprint $table) {
            $table->timestamps(); // Esto agregará created_at y updated_at
        });
    }
    
    public function down()
    {
        Schema::table('especialidad', function (Blueprint $table) {
            $table->dropTimestamps(); // Elimina los campos created_at y updated_at
        });
    }
    
};
