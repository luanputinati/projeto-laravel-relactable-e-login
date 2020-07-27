<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//GET -> Pegar dados;
//POST -> Salvar novos dados;
// PUT -> Atualizar dados;
//DELETE -> deletar dados;

//Route::get('/areas', 'API\AreaController@index');
//Route::post('/areas', 'API\AreaController@store');
//Route::get('{id}/areas/', 'API\AreaController@show');
//Route::put('{id}/areas/', 'API\AreaController@update');
//Route::delete('{id}/areas', 'API\AreaController@destroy');

            //OU

//Route::apiResource('areas', 'API\AreaController');
//Route::apiResource('studies', 'API\StudyController');

            //OU

Route::apiResources([
    'areas' => 'API\AreaController',
    'studies' => 'API\StudyController',
    'users' => 'API\UserController'
]);