<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AgregarImagenEstrenoProductos extends Migration
{
    public function up()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('imagen_estreno')->nullable();
        });
    }

    public function down()
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->dropColumn('imagen_estreno');
        });
    }
}
