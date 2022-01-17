<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MathController extends Controller
{
    //El método debe ser público.
    // Sigue las mismas reglas de las rutas y parámetros.
    public function factorialRecursivo($num)
    {
        return $this->factorialRec($num);
    }

    public function operacion(Request $req) 
    {
        //Pasos para validación.
        //Definir arreglo de reglas de validación.
        $reglas = [
            'numA' => 'required|integer', //Sintaxis con pipeline.
            'numB' => ['required', 'integer'], //sintaxis con arreglo.
            'operacion' => ['required', Rule::in([
                'suma',
                '+', 
                'resta', 
                '-', 
                'mult',
                '*',
                'div',
                '/',
                'mod'
            ])]
        ];

        //Implementar las reglas.
        //El método input devuelve un arreglo con todos los campos del formulario.
        $validator = Validator::make($req->input(), $reglas);

        //Ejecutar el validator.
        if($validator->fails()) {
            return $validator->errors();
        }
        $numA = $req->numA;
        $numB = $req->numB;
        $operacion = $req->operacion;
    
        if($operacion == 'suma' || $operacion == '+') {
            return $numA + $numB;
        }
    
        if($operacion == 'resta' || $operacion == '-') {
            return $numA - $numB;
        }
    
        if($operacion == 'mult' || $operacion == '*') {
            return $numA * $numB;
        }
    
        if($operacion == 'div' || $operacion == '/') {
            return $numA / $numB;
        }
    }

    private function factorialIterativo($numero) 
    {
        if($numero<0) $fact =0;
        else if($numero==0) $fact=1;
        else{ 
            $fact=1;
            for ($i = 1; $i <= $numero; $i++){
                $fact = $fact * $i;
            }
        }
        return $fact;
    }

    private function factorialRec($a)
    {
        if($a < 0 ) return 0;
        if($a > 1) {
            $r = $a * $this->factorialRec($a-1);
        } else {
            $r = $a;
        }
	    return $r;
    }


}
