<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarTipoAUsuarios extends Migration
{
    public function up()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->boolean('admin')->default(false);
        });
    }

    public function down()
    {
        Schema::table('usuarios', function (Blueprint $table) {
            $table->dropColumn('admin');
        });
    }
}
