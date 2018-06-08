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

/**
 * USER BEGIN
 */

//Route for creating new user
Route::post('/users', 'UserController@store')->middleware('auth:api');
/**
 * USER END
 */

/**
 * PROVINCE BEGIN
 */

//Route for creating new province
Route::post('/provincias', 'ProvinciaController@store')->middleware('auth:api');

//Route for getting the entire list of provinces
Route::get('/provincias/todos', 'ProvinciaController@showAll')->middleware('auth:api');

/**
 * PROVINCE END
 */

