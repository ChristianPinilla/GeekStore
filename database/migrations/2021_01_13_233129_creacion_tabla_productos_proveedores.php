<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreacionTablaProductosProveedores extends Migration
{
    public function up()
    {
        Schema::dropIfExists('productos_proveedores');
        Schema:: create('productos_proveedores', function(Blueprint $table){
            $table->id();
            $table->bigInteger('producto_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->integer('cantidad')->nullable();
            $table->timestamps();

            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos_proveedores');
    }
}
