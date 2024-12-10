<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiendas extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable = [
        'nombre',
        'ubicacion',
        'imagen',
        'hora_atencion',
        'dias_atencion',
        'telefono',
        'nombre_vendedor',
        'detalle_vendedor',

    ];
}
