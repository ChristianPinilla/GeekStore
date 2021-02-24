<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreacionTablaClasificaciones extends Migration
{
    public function up()
    {
        Schema::dropIfExists('clasificaciones');
        Schema:: create('clasificaciones', function(Blueprint $table){
            $table->id();
            $table->string('nombre')->nullable();
            $table->boolean('borrado')->default(false);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('clasificaciones');
    }
}
