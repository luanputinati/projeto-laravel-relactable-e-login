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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

// Tipos de requisição

//get --> Retornar um dado ou alguma visualização
//post --> salvar um dado
//put--> atualizar um dado
//delete --> deletar um dado


//Route::get('/areas','AreaController@index');
//Route::get('/areas/create', 'AreaController@create');


Route::group(['prefix' => '', 'as' => '', 'middleware' => ['auth', 'log']], function () {

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@checkDb');

    Route::group(['prefix' => '', 'as' => '', 'middleware' => ['admin']], function () {
        Route::resource('areas', 'AreaController')->except('show');
        Route::resource('studies', 'StudyController')->except('show');
    });
});