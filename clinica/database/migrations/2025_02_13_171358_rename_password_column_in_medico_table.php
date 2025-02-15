<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenamePasswordColumnInMedicoTable extends Migration
{
    public function up()
    {
        Schema::table('medico', function (Blueprint $table) {
            $table->renameColumn('password', 'contrasenia');
        });
    }

    public function down()
    {
        Schema::table('medico', function (Blueprint $table) {
            $table->renameColumn('contrasenia', 'password');
        });
    }
}
