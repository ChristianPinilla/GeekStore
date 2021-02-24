<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductoCompra extends Model
{
    protected $table = "productos_compras";

    protected $fillable = [
        'id',
        'compra_id',
        'producto_id',
        'cantidad_vendida',
        'monto_cantidad_vendida',
    ];


    //Asociaciones
    public function productos()
    {
        return $this->belongsTo('App\Models\Producto');
    }

    public function compras()
    {
        return $this->belongsTo('App\Models\Compra');
    }
}
