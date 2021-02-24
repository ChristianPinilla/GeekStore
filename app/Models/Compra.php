<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = "compras";

    protected $fillable = [
        'id',
        'usuario_id',
        'monto',
    ];

    
    //Asociaciones
    public function usuarios()
    {
        return $this->belongsTo('App\Models\Usuario');
    }
}
