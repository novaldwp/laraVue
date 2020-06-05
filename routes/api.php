<?php

use Illuminate\Http\Request;

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

//adding route for person
Route::get('/person', 'PersonController@all');
Route::get('/person/{id}', 'PersonController@show');
Route::post('/person', 'PersonController@store');
Route::put('/person/{id}', 'PersonController@update');
Route::delete('/person/{id}', 'PersonController@delete');
