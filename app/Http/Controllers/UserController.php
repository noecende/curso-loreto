<?php

namespace App\Http\Controllers;

use App\Models\Telefono;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('RegistrarUsuario');
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
        //Validar la entrada.
        $reglas = [
            'name' => 'required',
            'lastname' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'username' => 'required|string|unique:users,username',
            'telefono' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
            'chip' => 'required|string'
        ];

        $validator = Validator::make($request->input(), $reglas);

        if($validator->fails()) {
            return redirect('/users/create')->withErrors($validator)->withInput($request->all());
        }

        //Realizar operación.
        $user = new User(); //Instanciamos el modelo.
        $user->name = $request->name;
        $user->lastname = $request->lastname;
        $user->password = $request->password;
        $user->email = $request->email;
        $user->username = $request->username;
        $user->save(); //realizamos la consulta sql.
        
        $telefono = new Telefono();
        $telefono->telefono = $request->telefono;
        $telefono->chip = $request->chip;
        //Sin utilizar relación de eloquent.
        /*$telefono->user_id = $user->id;
        $telefono->save(); */

        //Utilizando la relación de eloquent.
        $user->telefono()->save($telefono); //Para operar sobre la relación utilizamos método.
        $user->telefono; //Para acceder a la relación utilizamos atributo.

        return $user;

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->telefono; //Devuelve el objeto del telefono.
        return $user;
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
    public function update(Request $request, $id)
    {
        //
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
