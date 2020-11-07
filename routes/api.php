<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::post('/registro', 'UsuariosController@registro');
Route::post('/actualizar', 'ClientesController@actualizar');
Route::post('/login', 'ClientesController@login');
Route::post('/registroCompra', 'ComprasController@nuevaCompra');
Route::post('/reparacion', 'ReparacionController@nuevaReparacion');
Route::get('/telefonia', 'ProductosController@Telefonia');
Route::get('/computacion', 'ProductosController@Computacion');
Route::get('/redes', 'ProductosController@Redes');
Route::post('/login', 'ClientesController@login');

