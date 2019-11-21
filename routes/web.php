<?php

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
    return view('welcome');
});

Route::get('/hola', function () {
    return view('bootstrap4');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::get('busqueda', 'BusquedaController@search')->name('search');
Route::get('autocomplete', 'BusquedaController@autocomplete')->name('autocomplete');

Route::get('autocomplete1', 'BusquedaController@autocomplete1')->name('autocomplete1');


//Route::get('busquedas','BusquedaController@busquedas')->name('busquedas');
Route::post('busquedas','BusquedaController@rbusquedas')->name('rbusquedas');


Route::get('resultados/{id}','BusquedaController@resultadoSer')->name('resultadoSer');
Route::get('resultadoe/{id}','BusquedaController@resultadoEdi')->name('resultadoEdi');


Route::get('resultado','BusquedaController@resultado')->name('resultado');



Auth::routes();



//Edificios


Route::resource('usuario', 'UsuarioController');/*->middleware('auth')*/

Route::resource('evento', 'EventoController');

Route::put('eliminar/{id}','EventoController@eliminar')->name('evento.eliminar');               /*

                        */
