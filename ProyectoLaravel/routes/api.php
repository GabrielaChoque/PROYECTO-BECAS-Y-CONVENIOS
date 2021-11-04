<?php

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
//GENERALES
Route::resource('Administrador', 'App\Http\Controllers\AdministrativoController');
Route::resource('Asignacion', 'App\Http\Controllers\AsignacionPracticaController');
Route::resource('Empresa', 'App\Http\Controllers\EmpresaController');
Route::resource('Informe', 'App\Http\Controllers\InformeController');
Route::resource('Practicante', 'App\Http\Controllers\PracticanteController');

//PARTICULARES
Route::post('ModificarPracticante/{IDPracticante}', 'App\Http\Controllers\PracticanteController@ModificarPracticante');
//SERIA: Metodo Post.   NOMBRE PARA LA LLAMADA ANGULAR ,   haciendo referencia PracticanteController a su funcion: ModificarPracticante

Route::post('BuscarID/{id}', 'App\Http\Controllers\AdministrativoController@BuscarID');
Route::post('PracticanteLogin', 'App\Http\Controllers\PracticanteController@PracticanteLogin');
Route::post('AdministrativoLogin', 'App\Http\Controllers\AdministrativoController@AdministrativoLogin');

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
