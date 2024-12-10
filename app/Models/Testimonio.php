<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonio extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'contenido',
        'imagen',
        'categoria',
        'vistas',
        'comentarios_count',
    ];

    public function scopeSearch($query, $search)
    {
        return $query->where('titulo', 'like', "%{$search}%")
                     ->orWhere('contenido', 'like', "%{$search}%")
                     ->orWhere('categoria', 'like', "%{$search}%");
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class);
    }
}
