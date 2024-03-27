<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes();
Route::get('/', 'PlayerController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('players')->group(function () {

    //rotas para importação
    Route::get('import', 'PlayerController@import'); // tela de pedido
    Route::post('store-import', 'PlayerController@storeImport'); //implementa na db

    //grupo de rotas para os autenticados-VIPs
    Route::group(['middleware' => 'auth'],function () {
        // Rotas para create
        Route::get('create', 'PlayerController@create');
        Route::post('/', 'PlayerController@store');
        // Rota para editar
        Route::get('{player}/edit', 'PlayerController@edit');
        Route::put('{player}', 'PlayerController@update');
        // Rota para deletar
        Route::delete('{player}', 'PlayerController@destroy');

        //  Rota para salvar dados em CSV
        Route::get('export', 'PlayerController@export');
     });

     // Rota para mostrar detalhes do jogador
     Route::get('{player}', 'PlayerController@show');
    
     // rotas para show e read
    Route::get('', 'PlayerController@index');


});




