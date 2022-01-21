<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vacuna extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'marca',
        'no_dosis'
    ];

    /**
     * Relación muchos a muchos.
     */
    public function mascotas()
    {
        /**
         * mascota_vacuna y por orden alfabetico.
         */
        //una vacuna puede tener muchas mascotas.
        //El modelo y el nombre de la tabla.
        return $this->belongsToMany(Mascota::class, 'mascotas_vacunas');
    }
}
