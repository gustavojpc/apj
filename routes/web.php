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



Route::get('/', 'FrontController@index');
Route::get('/index', 'FrontController@index')->name('home');

Route::get('/produtos', 'FrontController@produtos')->name('produtos');

Route::get('/detalhe_produto', 'FrontController@detalhe_produto')->name('detalhe_produto');

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/carrinho', 'CarrinhoController');

Route::get('/logout', 'auth\LoginController@logout');

Route::group(['prefix' => 'admin','middleware'=>['auth','admin']], function () {
    Route::get('/', 'PedidosController@Pedidos')->name('admin.index');

    Route::resource('produto', 'ProdutosController');
    Route::delete('/produto/{produto}', 'ProdutosController@deletar');
    Route::get('/produto/{produto}/editar', 'ProdutosController@editar');
    Route::get('/produto/{produto}/estado', 'ProdutosController@mudarestado');
    Route::patch('/produto/{produto}', 'ProdutosController@update');
    Route::resource('categoria', 'CategoriasController');
    Route::resource('unidade', 'UnidadesController');
    Route::get('pedidos/{type?}', 'PedidosController@Pedidos');
    Route::get('pedidos/{pedido}/entregar', 'PedidosController@Entregar');

});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/entrega', 'CheckoutController@Entrega') ->name('checkout.entrega');
});

//Route::get('/checkout', 'CheckoutController@Passo1');

Route::resource('endereco', 'EnderecoController');

