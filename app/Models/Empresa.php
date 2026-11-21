<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    protected $table = 'empresa';

    protected $fillable = [
        'nombre',
        'descripcion',
        'correo',
        'telefono',
        'direccion',
        'logo',
    ];
}
