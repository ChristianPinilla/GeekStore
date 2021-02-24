<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoProveedor extends Model
{
    protected $table = "productos_proveedores";

    protected $fillable = [
        'id',
        'producto_id',
        'proveedor_id',
        'cantidad'
    ];


    //Asociaciones
    public function productos()
    {
        return $this->belongsTo('App\Models\Producto');
    }

    public function proveedores()
    {
        return $this->belongsTo('App\Models\Proveedor');
    }
}
