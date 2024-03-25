<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlayerController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');






Route::prefix('players')->group(function () {

    // rotas para show e read
    Route::get('', 'PlayerController@index');

    Route::group(['middleware' => 'auth'],function () {
        // Rotas para create
        Route::get('create', 'PlayerController@create');
        Route::post('/', 'PlayerController@store');
        // Rota para editar
        Route::get('{player}/edit', 'PlayerController@edit');
        Route::put('{player}', 'PlayerController@update');
        // Rota para deletar
        Route::delete('{player}', 'PlayerController@destroy');
     });

    // Rota para mostrar detalhes do jogador
    Route::get('{player}', 'PlayerController@show');
});

// Rota para salvar dados em CSV
Route::get('players/save', 'PlayerController@export');




// //rota para importar csv
// dd(Route::post('/import-players/{path}', 'PlayerController@import')->name('players.load'));

