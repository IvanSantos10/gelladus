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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('produtos', 'ProdutoController');
Route::resource('registros', 'Auth\RegistroController');
Route::resource('estoques', 'EstoqueController');
Route::get('pedidos/fechado', 'PedidoController@fechado')->name('pedidos.fechado');
Route::resource('pedidos', 'PedidoController');
Route::get('pedidos/{pedido}/finalizado', 'PedidoController@finalizar')->name('pedido.finalizado');
