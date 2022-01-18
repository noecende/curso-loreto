<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     * GET
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return 'Aquí va la lista de todos los usuarios';
    }

    /**
     * Show the form for creating a new resource.
     * Mostrar formulario para crear un nuevo usuario.
     * GET
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('RegistrarUsuario');
    }

    /**
     * Store a newly created resource in storage.
     * Guardar al usuario.
     * POST
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validar la entrada.
        $reglas = [
            'nombre' => 'required',
            'apellidos' => 'required|integer',
            'email' => 'required|email',
            'username' => 'required'
        ];

        $validator = Validator::make($request->input(), $reglas);

        if($validator->fails()) {
            return redirect('/usuarios/create')->withErrors($validator)->withInput($request->all());
        }

        //Guardar al usuario.

        //Redirigimos a la vista de todos los usuarios.

        return redirect('/usuarios');
    }

    /**
     * Display the specified resource.
     * GET
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('usuario');
    }

    /**
     * Show the form for editing the specified resource.
     * GET
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     * PUT
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * DELETE
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
