<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clasificacion extends Model
{
    protected $table = "clasificaciones";

    protected $fillable = [
        'id',
        'nombre'
    ];

    public function _toString()
    {
        return $this->nombre;
    }

    
    //Asociaciones
    public function productos()
    {
        return $this->hasMany('App\Models\Producto');
    }
}
