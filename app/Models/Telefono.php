<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Telefono extends Model
{
    use HasFactory;

    //Especificar el nombre de la tabla, por default laravel buscará el nombre del modelo en plural.
    protected $table = 'telefonos';

    protected $fillable = [
        'telefono',
        'chip',
        'user_id'
    ];

    public function user()
    {
        //regresamos la relación.
        return $this->belongsTo(User::class);
    }

}
