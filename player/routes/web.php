<?php

use App\Http\Controllers\PlayerController;
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




Route::get('/home', 'HomeController@index')->name('home');

//rotas para create
Route::get('/players/create', 'PlayerController@create')->name('players.create');
Route::post('/players/new', 'PlayerController@store')->name('players.create-player');

//rotas para show e read
Route::get('/players', 'PlayerController@index')->name('players');
Route::get('/players/{player}', 'PlayerController@show')->name('players.show');


//rota para editar
Route::get('/players/{player}/edit', 'PlayerController@edit')->name('players.edit');
Route::put('/players/{player}', 'PlayerController@update')->name('players.update');


//rota para deletar
Route::delete('/players/{player}', 'PlayerController@destroy')->name('players.destroy');

//rota para salvar dados em csv
Route::get('/export-players', 'PlayerController@export')->name('players.save');

// //rota para importar csv
// dd(Route::post('/import-players/{path}', 'PlayerController@import')->name('players.load'));

