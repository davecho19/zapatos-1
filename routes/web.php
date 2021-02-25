<?php

use Illuminate\Support\Facades\Route;

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


Route::get('/pedidos', 'PedidoController@index')->name('tropical.index');
Route::get('/tropical/create', 'PedidoController@create')->name('tropical.create');
Route::post('/pedidos', 'PedidoController@store')->name('pedidos.store');
Route::get('/pedidos/{pedido}', 'PedidoController@show')->name('tropical.show');
Route::get('/pedidos/{pedido}/edit', 'PedidoController@edit')->name('tropical.edit');
Route::put('/pedidos/{pedido}', 'PedidoController@update')->name('tropical.update');
Route::delete('/pedidos/{pedido}', 'PedidoController@destroy')->name('tropical.destroy');

Auth::routes();






