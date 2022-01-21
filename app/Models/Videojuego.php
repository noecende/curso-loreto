<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Videojuego extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'descripcion',
        'categoria_id',
        'user_id',
        'consola',
        'fecha_lanzamiento'
    ];

    //Valores por defecto
    protected $attributes = [
        'consola' => 'pc'
    ];

    //Definición de la relación con categoría.
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
