<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreacionTablaProductos extends Migration
{
    public function up()
    {
        Schema::dropIfExists('productos');
        Schema:: create('productos', function(Blueprint $table){
            $table->id();
            $table->string('nombre')->nullable();
            $table->string('imagen')->nullable();
            $table->integer('precio_unidad')->nullable();
            $table->integer('stock_actual')->nullable();
            $table->tinyInteger('stock_critico')->nullable();
            $table->bigInteger('clasificacion_id')->unsigned();
            $table->bigInteger('proveedor_id')->unsigned();
            $table->integer('cantidad_vendida')->default(0);
            $table->boolean('borrado')->default(false);
            $table->timestamps();

            $table->foreign('clasificacion_id')->references('id')->on('clasificaciones')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('proveedor_id')->references('id')->on('proveedores')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
