<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MascotaResource;
use App\Models\Mascota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MascotaApiController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $mascotas = Mascota::with('vacunas')->get(); //Get
        return MascotaResource::collection($mascotas);
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
            return response()->json([
                'category' => 'validacion',
                'errors' => $validator->errors()
            ], 400);
        }

        /* if(Auth::user()->cant('create', Mascota::class)) {
            return "Permiso denegado";
        } */

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
        return $mascota;
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
        $mascota = Mascota::find($id);
        if($mascota == null) {
            return response()->json([
                'errors' => 'La mascota no existe en la base de datos.',
                'category' => 'Not found.'
            ], 404);
        }
        return $mascota;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $mascota = Mascota::find($id);
        if($mascota == null) {
            return response()->json([
                'errors' => 'La mascota no existe en la base de datos.',
                'category' => 'Not found.'
            ], 404);
        }

        $reglas = [
            'nombre' => 'sometimes|required|string',
            'especie' => [
                'sometimes',
                'required',
                Rule::in([
                    'perro', 
                    'gato', 
                    'pez', 
                    'tortuga', 
                    'cuyo'])],
            'edad' => ['sometimes', 'required', 'integer', 'gte:0'],
            'fecha' => ['sometimes', 'required', 'date']
        ];

        $validator = Validator::make($request->input(), $reglas);

        if($validator->fails()) {
            return response()->json([
                'category' => 'validacion',
                'errors' => $validator->errors()
            ], 400);
        }

        //Si el campo está presente, lo colocamos en la mascota.
        if($request->nombre != null) {
            $mascota->nombre = $request->nombre;
        }

        if($request->especie != null) {
            $mascota->especie = $request->especie;
        }

        if($request->edad != null) {
            $mascota->edad = $request->edad;
        }

        if($request->fecha != null) {
            $mascota->fecha = $request->fecha;
        }

        $mascota->save();
        return $mascota;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        $mascota = Mascota::find($id); //Una instancia del modelo. Si no lo encuentra, devuelve null.
        if($mascota == null) {
            return response()->json([
                'errors' => 'La mascota no existe en la base de datos.',
                'category' => 'Not found.'
            ], 404);
        }
        $mascota->delete();
        return $mascota;
    }
}
