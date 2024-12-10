<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    use HasFactory;
    protected $fillable = [
        'testimonio_id',
        'nombre',
        'contenido',
    ];

    public function testimonio()
    {
        return $this->belongsTo(Testimonio::class);
    }
}
