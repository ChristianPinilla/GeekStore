<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreacionTablaUsuarios extends Migration
{

    public function up()
    {
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();
            $table->string('nombres')->nullable();
            $table->string('primer_apellido')->nullable();
            $table->string('segundo_apellido')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('telefono')->nullable();
            $table->string('direccion')->nullable();
            $table->integer('monto_total_comprado')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('usuarios');
    }
}
