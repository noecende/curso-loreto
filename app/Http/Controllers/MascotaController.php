<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MascotaController extends Controller
{
    public function crear()
    {
        return view('CrearMascota', ['titulo' => 'Crear mascota']);
    }

    public function post(Request $req)
    {
        $reglas = [
            'nombre' => 'required|string',
            'especie' => ['required', Rule::in(['perro', 'gato', 'pez', 'tortuga', 'cuyo'])],
            'edad' => ['required', 'integer', 'gte:0'],
            'fecha' => ['required', 'date']
        ];

        $validator = Validator::make($req->input(), $reglas);

        if($validator->fails()) {
            return redirect('/crearMascota')->withErrors($validator)->withInput();
        }

        //Guardaríamos la mascota.
        return view('mascotas');
    }
}
