<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tienda extends Model
{
    use HasFactory;

    protected $table = 'tiendas';

    protected $fillable = [

        'nombre',
        'direccion',
        'telefono',
        'email',
        'latitud',
        'longitud',
        'image',

    ];

    protected $hidden = [

        'created_at',
        'updated_at',
        
    ];
}
