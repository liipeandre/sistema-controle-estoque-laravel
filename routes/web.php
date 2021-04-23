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

Route::get('', 'App\Http\Controllers\ViewsController@index')->name('views.index');
Route::get('/', 'App\Http\Controllers\ViewsController@index')->name('views.index');
Route::post('/login', 'App\Http\Controllers\UsuarioController@login')->name('usuario.login');
Route::get('/logout', 'App\Http\Controllers\UsuarioController@logout')->name('usuario.logout');

Route::get('/main', 'App\Http\Controllers\ViewsController@main')->name('views.main');

Route::any('/produtos/insert', 'App\Http\Controllers\ProdutoController@insert')->name('produtos.insert');
Route::get('/produtos/delete', 'App\Http\Controllers\ProdutoController@delete')->name('produtos.delete');
Route::get('/produtos', 'App\Http\Controllers\ProdutoController@list')->name('produtos.list');
Route::get('/produtos/edit', 'App\Http\Controllers\ProdutoController@view')->name('produtos.view');
Route::post('/produtos/edit', 'App\Http\Controllers\ProdutoController@edit')->name('produtos.edit');
