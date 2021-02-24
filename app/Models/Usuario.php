<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticable;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticable
{
    protected $table = "usuarios";

    protected $fillable = [
        'id',
        'nombres',
        'primer_apellido',
        'email',
        'password',
        'direccion',
        'telefono',
        'monto_total_comprado',
    ];

    public function _toString()
    {
        return $this->nombres+' '+$this->primer_apellido;
    }

    //Asociaciones
    public function compras()
    {
        return $this->hasMany('App\Models\Compra');
    }
}
