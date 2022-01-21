<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mascota extends Model
{
    use HasFactory;

    //Llenable.
    protected $fillable = [
        'nombre',
        'especie',
        'edad',
        'fecha'
    ];
    //Aquí van los campos que no son "mass asignable".
    protected $hidden = [

    ];

    //Valores default de los atributos.
    protected $attributes = [
         'especie' => 'perro'
    ];

    /**
     * Relación muchos a muchos.
     */
    public function vacunas()
    {
        //Una mascota puede tener muchas vacunas.
        return $this->belongsToMany(Vacuna::class, 'mascotas_vacunas');
    }
}
