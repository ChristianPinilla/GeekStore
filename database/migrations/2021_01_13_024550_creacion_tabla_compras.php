<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreacionTablaCompras extends Migration
{
    public function up()
    {
        Schema::dropIfExists('compras');
        Schema:: create('compras', function(Blueprint $table){
            $table->id();
            $table->integer('monto')->nullable();
            $table->timestamps();
            $table->bigInteger('usuario_id')->unsigned();

            $table->foreign('usuario_id')->references('id')->on('usuarios')->onDelete('CASCADE')->onUpdate('CASCADE');
        });
    }

    public function down()
    {
        Schema::dropIfExists('compras');
    }
}
