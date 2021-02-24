<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = "productos";

    protected $fillable = [
        'id',
        'nombre',
        'imagen',
        'precio_unidad',
        'stock_actual',
        'stock_critico',
        'clasificacion_id',
        'proveedor_id'
    ];

    public function _toString()
    {
        return $this->nombre;
    }

    
    //Asociaciones
    public function productos_compras()
    {
        return $this->hasMany('App\Models\ProductoCompra');
    }

    public function clasificaciones()
    {
        return $this->belongsTo('App\Models\Clasificacion');
    }

    public function proveedores()
    {
        return $this->belongsTo('App\Models\Proveedor');
    }

}
