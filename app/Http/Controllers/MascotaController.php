<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     * Listar todas las mascotas.
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /* $mascotas = [
            'titulo' => 'Mascotas',
            'mascotas' => [[
                'nombre' => 'Silvio',
                'edad' => 12, 
                'fecha_nacimiento' => '2019-01-13', 
                'especie' => 'Gato'], [
                    'nombre' => 'Zeus',
                    'edad' => 6, 
                    'fecha_nacimiento' => '2015-06-13', 
                    'especie' => 'Perro']
            ]
        ]; */
        $mascotas = Mascota::all(); //Realiza consulta sql para obtener todas las mascotas.
        return view('Mascotas', [
            'mascotas' => $mascotas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('CrearMascota', ['titulo' => 'Crear Mascota']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $reglas = [
            'nombre' => 'required|string',
            'especie' => [
                'required',
                Rule::in([
                    'perro', 
                    'gato', 
                    'pez', 
                    'tortuga', 
                    'cuyo'])],
            'edad' => ['required', 'integer', 'gte:0'],
            'fecha' => ['required', 'date']
        ];

        $validator = Validator::make($request->input(), $reglas);

        if($validator->fails()) {
            return redirect('/mascotas/create')->withErrors($validator)->withInput();
        }

        //Guardaríamos la mascota.
        //Podemos mandar todo el arreglo por el constructor. 
        //O podemos acceder a los atributos como atributos dinámicos del objeto
        $mascota = new Mascota($request->all());
        /* $mascota->nombre = $request->nombre;
        $mascota->especie = $request->especie;
        $mascota->edad = $request->edad;
        mascota->fecha = $request->fecha; */
        //Hacer la consulta.
        $mascota->save();
        return redirect('/mascotas');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * Mostrar formulario para actualizar el recurso.
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Mascota $mascota)
    {
        //$mascota = Mascota::find($id);  //Buscar mascota por id en la base de datos.
        return view('EditarMascota', [
            'mascota' => $mascota]);
    }

    /**
     * Update the specified resource in storage.
     * METODO PUT DE HTTP
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $reglas = [
            'nombre' => 'required|string',
            'especie' => [
                'required',
                Rule::in([
                    'perro', 
                    'gato', 
                    'pez', 
                    'tortuga', 
                    'cuyo'])],
            'edad' => ['required', 'integer', 'gt:0'],
            'fecha' => ['required', 'date']
        ];

        $validator = Validator::make($request->input(), $reglas);

        if($validator->fails()) {
            return redirect("/mascotas/$id/edit")->withErrors($validator)->withInput();
        }

        //Obtenemos el modelo.
        $mascota = Mascota::find($id);
        $mascota->nombre = $request->nombre;
        $mascota->edad = $request->edad;
        $mascota->fecha = $request->fecha;
        $mascota->especie = $request->especie;
        $mascota->save();
        return redirect('/mascotas');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $mascota = Mascota::find($id); //Buscar la mascota por id en la base de datos.
        $mascota->delete(); //Hacer consulta a la base de datos para eliminar el modelo.
        return redirect('/mascotas');
    }
}
