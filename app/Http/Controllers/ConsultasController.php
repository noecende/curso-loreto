<?php

namespace App\Http\Controllers;

use App\Models\Mascota;
use App\Models\User;
use App\Models\Vacuna;
use App\Models\Videojuego;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConsultasController extends Controller
{
    //Ejercicios de consultas con eloquent.

    //Obtener las vacunas que sean de n dosis. Vamos a enviar a través del url los parámetros

    public function obtenerVacunasNDosis(Request $request)
    {
        //Dos parámetros: la columna y el valor.
        return Vacuna::where('no_dosis', $request->n)->get(); //El método get devuelve una Colección.
    }

    //Obtener los videojuegos que pertenezcan a una categoría.
    public function videojuegosPorCategoria(Request $request) 
    {
        //Podemos agregar where y se utilizan como si fuera un and. Por ejemplo: where categoria_id = n and consola = "consola"
        return Videojuego::where('categoria_id', $request->categoria_id)
                            ->where('consola', $request->consola)->get();
    }

    public function ejemploOr(Request $request)
    {
        return Mascota::where('edad', '<', $request->edad)->orWhere('especie', $request->especie)->get();
    }

    public function ejemplo()
    {
        //Sin eager Loading
        $usuarios = User::all();  //3 usuarios

        foreach($usuarios as $usuario) {
            $usuarios->videojuegos;
        }

        //Con Eager Loading
        $usuarios = User::with('videojuegos')->all(); //Obtener todos los usuarios con sus videojuegos.
        foreach($usuarios as $usuario) {
            $usuario->videojuegos;
        }
    }

    public function usuariosConVideojuegos()
    {
        $usuarios = User::with('videojuegos')->get()->all(); //Una sola consulta
        return $usuarios;
    }

    public function consultaUnion()
    {
        //$videojuegos = DB::table('videojuegos')->select('titulo as nombre', 'descripcion')->get(); 
        //Cuando usamos expresiones crudas tenemos que sanitizar la entrada. 
        //$resultado = DB::table(DB::raw('videojuegos, users'))->select('*')->where('videojuegos.user_id', 2)->get();

        
        /* $resultado = DB::table('users')
                        ->join('videojuegos', 'users.id', '=', 'videojuegos.user_id')
                        ->join('telefonos', 'users.id', '=', 'telefonos.user_id')
                        ->where('consola', 'pc')
                        ->get(); */
        /* $resultado = DB::table('mascotas')
                        ->join(
                            DB::raw('
                            (
                                SELECT 
                                   vacunas.nombre AS vacuna, mascotas_vacunas.mascota_id AS mascota_id
                                FROM
                                    mascotas_vacunas
                                INNER JOIN vacunas ON vacunas.id = mascotas_vacunas.vacuna_id) AS subquery'), 'mascotas.id', '=', 'subquery.mascota_id')
                        ->get(); */
        //$resultados = DB::select(DB::raw('call procedimiento()'))->get();  
        
        $resultados = User::where(function ($query) {
            $query->select('telefono')->from('telefonos')->whereColumn('telefonos.chip', 'telcel')->whereColumn('telefonos.chip', 'users.id');
        })->get(); 
        
        return $resultados;
    }


}
