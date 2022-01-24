<?php

use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\MascotaApiController;
use App\Http\Controllers\Api\UserApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('/users', UserApiController::class);

Route::apiResource('/mascotas', MascotaApiController::class);

Route::post('/login', [LoginApiController::class, 'login']);

Route::post('/logout', [LoginApiController::class, 'logout']);

Route::post('/olvidarDispositivos', [LoginApiController::class, 'olvidarDispositivos']);



