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


Route::get('/empresa' , 'empresaController@index')->name('index');
Route::get('/empresa/create' , 'empresaController@create')->name('create');
Route::post('/empresa/create' , 'empresaController@store')->name('store');
Route::get("empresa/editar/{empresa}", 'empresaController@editar')->name('edit');
Route::put("empresa/editar/{empresa}" , 'empresaController@update')->name('update');
Route::delete('empresa/remover/{empresa}' , 'empresaController@destroy');



Route::get('empresa/{empresa}/produtos' , 'ProdutoController@index')->name('index.produtos');
Route::get('/produtos/{empresa}/produtos' , 'ProdutoController@create')->name('produto/cadastrar');

Route::post('/produtos/{empresa}/produtos' , 'ProdutoController@store')->name('store.produto');




Route::get('/produto/{produto}/editar' , 'ProdutoController@edit')->name('edit.produto');
Route::post('/produto/{produto}/editar' , 'ProdutoController@update')->name('update.produto');
Route::delete('/produtos/{produto}/delete' , 'ProdutoController@delete')->name('delete.produto');


Route::get('vendas/{Empresa}', 'VendaController@index')->name('relatorio_vendas');
Route::get('vendas/{Empresa}/create' ,'VendaController@create')->name('create_venda');
Route::post('/resultado/{Empresa}' ,'VendaController@update')->name('resultado');