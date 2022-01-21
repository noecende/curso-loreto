<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Mostrar formulario de login.
     */
    public function mostrarFormulario()
    {
        return view('login');
    }


    /**
     * Método que se encarga de autenticar al usuario.
     */
    public function login(Request $request)
    {
        $credenciales = [
            'email' => $request->email,
            'password' =>$request->password
        ];
        //Si las credenciales son correctas
        if(Auth::attempt($credenciales)) {
            Auth::user()->telefono;
            return Auth::user(); //devuelve el modelo del usuario.
        };
        return 'Credenciales inválidas.';
    }

    public function logout()
    {
        //Cerrar la sesión.
        Auth::logout();
        //redirigir a la raíz de la página.
        return redirect('/');
    }
}
