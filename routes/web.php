<?php

use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\ConsultasController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MascotaController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\VacunaController;
use App\Http\Controllers\VideojuegoController;
use Illuminate\Support\Facades\Route;
use App\Utils\Ejemplo;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landing');
});

Route::get('/holaMundoWeb', function() {
    return "Hola mundo Web";
});

/**
 * Se utiliza la sintaxis de llaves.
 * Se asignan los parámetros por orden. 
 */
Route::get('/suma/{numA}/{numB}', function($a, $b) {
    return $a + $b;
});

Route::get('/estatico', function() {
    return Ejemplo::holaMundoEstatico();
});

Route::get('/dinamico', function() {
     $ejemplo = new Ejemplo();
     return $ejemplo->holaMundo();
});

Route::post('/formulario', function(Request $req) {
    //Los parámetros del body se reciben en un objeto de tipo Request. 
    //Se accede a los campos como atributos dinámicos.
    //En php se concatena con punto.
    return 'Hola, tu nombre es ' . $req->name . " " . $req->lastname; 
});

Route::post('/concatenacion', function(Request $req) {
    //
    return "Concatenación $req->uno $req->dos";
});

Route::post('/concatenacion2', function(Request $req) {
    //Da error porque sí está llamando al método
    return "Concatenación {$req->uno->method()} {$req->dos}"; 
});

/**
 * Hacer una ruta post que reciba una cadena en el body y la convierta a mayúsculas
 */

 /**
  * Hacer una ruta que reciba dos números y realice una operación aritmética
  * definida en el body.
  */
Route::post('/operacion/{numA}/{numB}' , function(Request $req, $numA, $numB) {
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

    return 'Operación no permitida';


})->where([
    'numA' => '[0-9]+',
    'numB' => '[0-9]+'
]);

/**
 * Para definir arreglos utilizamos la sintaxis de corchete. 
 * Para asignar un valor a una llave utilizamos la sintaxis => 
 * Los objetos (o llaves-valor) se separan por coma.
 * 
 * ejemplo:  [
 *    "name" => "Leopoldo Antonio",
 *     "lastname" => "Madero Ortiz"
 * ];
 * 
 * 'numA' => '[0-9]+',
    'numB' => '[0-9]+'
 * 
 */

/**
 * El atributo class devuelve el nombre completo de la clase: 
 *  App\Http\Controllers\MathController
 *  
 *  Primer objeto del array debe ir la clase del controlador.
 *  Segundo objeto: el nombre del método que queremos asignar.
 */
Route::get('/factorialRecursivo/{num}', [MathController::class, 'factorialRecursivo']);
/**
 * Ruta operación pero implementando controladores.
 */
Route::post('/operacionController', [MathController::class, 'operacion']);

//API del recurso mascotas
//Vamos a utilizar sintaxis de REST.
//Route::post('/mascotas', [MascotaController::class, 'post']);

Route::resource('/mascotas', MascotaController::class);

Route::resource('/users', UserController::class);

Route::resource('/categorias', CategoriaController::class);

Route::resource('/videojuegos', VideojuegoController::class);

Route::resource('/posts', PostController::class);

Route::resource('/vacunas', VacunaController::class);

Route::middleware('auth')
        ->post('/vacunas/{vacuna}/mascotas/{mascota}', [VacunaController::class, 'aplicarVacuna']);


// localhost/usuarios
// localhost/usuarios/{id} -> get, put, delete
// localhost/usuarios/create mostrar formulario para crear
// localhost/usuarios/{id}/edit mostrar formulario para editar

/**Ejercicios de query con eloquent **/

Route::get('/vacunasNDosis', [ConsultasController::class, 'obtenerVacunasNDosis']);

Route::get('/videojuegosPorCategoria', [ConsultasController::class, 'videojuegosPorCategoria']);

Route::get('/ejemploOr', [ConsultasController::class, 'ejemploOr']);

Route::get('/ejemploEagerLoading', [ConsultasController::class, 'usuariosConVideojuegos']);

Route::get('/union', [ConsultasController::class, 'consultaUnion']);

Route::get('/login', [LoginController::class, 'mostrarFormulario'])->name('login');

Route::post('/login', [LoginController::class, 'login']);

Route::get('/logout', [LoginController::class, 'logout']);

