<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreacionTablaProductosCompras extends Migration
{
    public function up()
    {
        Schema::dropIfExists('productos_compras');
        Schema:: create('productos_compras', function(Blueprint $table){
            $table->id();
            $table->bigInteger('compra_id')->unsigned();
            $table->bigInteger('producto_id')->unsigned();
            $table->integer('cantidad_vendida')->nullable();
            $table->integer('monto_cantidad_vendida')->nullable();
            $table->timestamps();

            $table->foreign('compra_id')->references('id')->on('compras')->onDelete('CASCADE')->onUpdate('CASCADE');
            $table->foreign('producto_id')->references('id')->on('productos')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('productos_compras');
    }
}
