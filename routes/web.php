<?php

use App\Http\Controllers\MascotaController;
use App\Http\Controllers\MathController;
use App\Http\Controllers\UsuarioController;
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

Route::get('/login', function() {
    return view('login');
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

//Asigna todos los verbos http y todos los métodos para mostrar formularios
Route::resource('/usuarios', UsuarioController::class);

Route::resource('/mascotas', MascotaController::class);




// localhost/usuarios
// localhost/usuarios/{id} -> get, put, delete
// localhost/usuarios/create mostrar formulario para crear
// localhost/usuarios/{id}/edit mostrar formulario para editar