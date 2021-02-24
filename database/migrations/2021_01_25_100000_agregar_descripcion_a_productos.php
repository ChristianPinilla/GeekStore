<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarDescripcionAProductos extends Migration
{
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('descripcion')->nullable();
        });
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('descripcion');
        });
    }
}
