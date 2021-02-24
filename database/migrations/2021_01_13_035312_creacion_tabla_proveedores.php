<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreacionTablaProveedores extends Migration
{
    public function up()
    {
        Schema::dropIfExists('proveedores');
        Schema:: create('proveedores', function(Blueprint $table){
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('direccion')->nullable();
            $table->boolean('borrado')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('proveedores');
    }
}
