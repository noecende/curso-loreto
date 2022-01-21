<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class VideojuegoController extends Controller
{
    public function __construct()
    {
        //Elegimos los métodos que no requerimos protección.
        $this->middleware('auth'); 
        //Elegimos las rutas a las que le vamos a aplicar la protección.
        //$this->middleware('auth')->only(['store', 'update', 'delete', 'show']);
    }
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = Auth::user();
        if($user->cant('viewAny', Videojuego::class)) {
            return 'Acceso denegado';
        }
        $user = User::find($request->user_id);
        //Las relaciones devuelven colecciones
        $videojuegos = $user->videojuegos; //Devuelve una colección de videojuegos.
        return $videojuegos;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $rules = [
            'categoria_id' => 'required|exists:categorias,id',
            'user_id' => 'required|exists:users,id'
        ];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()) {
            return $validator->errors();
        }

        $videojuego = new Videojuego($request->all());
        $videojuego->save();
        return $videojuego;
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
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Videojuego $videojuego)
    {
        //
        $user = Auth::user();
        if($user->cant('update', $videojuego)) {
            return 'acceso denegado';
        }

        $videojuego ->nombre = $request->nombre;
        $videojuego->descripcion = $request->descripcion;
        $videojuego->fecha_lanzamiento = $request->fecha_lanzamiento;
        $videojuego->consola = $request->consola;
        $videojuego->categoria_id = $request->categoria_id;
        $videojuego->user_id = $request->user_id;
        $videojuego->save();
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
    }
}
