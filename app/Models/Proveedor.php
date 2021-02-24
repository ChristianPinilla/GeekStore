<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    protected $table = "proveedores";

    protected $fillable = [
        'id',
        'nombre',
        'direccion'
    ];

    public function _toString()
    {
        return $this->nombre;
    }

    //Asociaciones
    public function productos_proveedores()
    {
        return $this->hasMany('App\Models\ProductoProveedor');
    }
}
