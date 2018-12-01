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
Route::get('sesiones', function(){
    return Session::all();
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('hola/{nombre}/{apellido?}',function($nombre = 'Invitado',$apellido = "Perez") {
    return 'Hola ' . $nombre . ' ' . $apellido;
});

Route::get('ejercicio/{numero1}/{numero2}/{operacion}', function($numero1, $numero2, $operacion){
    $resultado = 0;
    switch($operacion) {
        case 'suma':
            $resultado = $numero1 + $numero2;
        break;
        case 'multiplicacion':
            $resultado = $numero1 * $numero2;
        break;
        case 'division':
            $resultado = $numero1 / $numero2;
        break;
        case 'resta':
            $resultado = $numero1 - $numero2;
        break;
        default:
            $resultado = "No existe la operacion";
        break;
    }
    return $resultado;
});

//Route::get('permisos','PruebaController@primerMetodo');
#Route::resource('permisos', 'PruebaController');

// Route::get('permisos', 'PruebaController@index');
// Route::post('permisos', 'PruebaController@store');
// Route::get('permisos/create', 'PruebaController@create');
// Route::get('permisos/{id}/edit', 'PruebaController@edit');
// Route::put('permisos/{id}', 'PruebaController@update');
// Route::delete('permisos/{id}', 'PruebaController@destroy')->name('permisos.destroy');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth', 'prefix' => 'admin'], function(){
    Route::resource('permisos', 'PruebaController');

});

Route::resource('product', 'ProductController');