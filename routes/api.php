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

//Route for getting the province with given id
Route::get('/provincias/{id}', 'ProvinciaController@show')->middleware('auth:api');

//Route for getting the paginated list of provinces
Route::get('/provincias', 'ProvinciaController@index')->middleware('auth:api');

//Route for updating the given province
Route::put('/provincias/{id}', 'ProvinciaController@update')->middleware('auth:api');

//Route for deleting the given province
Route::delete('/provincias/{id}', 'ProvinciaController@destroy')->middleware('auth:api');

/**
 * PROVINCE END
 */

/**
 * MUNICIPIO BEGIN
 */

//Route for creating new municipio
Route::post('/municipios', 'MunicipioController@store')->middleware('auth:api');

//Route for getting the entire list of municipios
Route::get('/municipios/todos', 'MunicipioController@showAll')->middleware('auth:api');

//Route for getting the municipio with given id
Route::get('/municipios/{id}', 'MunicipioController@show')->middleware('auth:api');

//Route for getting the paginated list of municipios
Route::get('/municipios', 'MunicipioController@index')->middleware('auth:api');

//Route for updating the given municipio
Route::put('/municipios/{id}', 'MunicipioController@update')->middleware('auth:api');

//Route for deleting the given municipio
Route::delete('/municipios/{id}', 'MunicipioController@destroy')->middleware('auth:api');

/**
 * MUNICIPIO END
 */

/**
 * PLAGA BEGIN
 */

//Route for creating new plaga
Route::post('/plagas', 'PlagaController@store')->middleware('auth:api');

//Route for getting the entire list of plagas
Route::get('/plagas/todos', 'PlagaController@showAll')->middleware('auth:api');

//Route for getting the plaga with given id
Route::get('/plagas/{id}', 'PlagaController@show')->middleware('auth:api');

//Route for getting the paginated list of plagas
Route::get('/plagas', 'PlagaController@index')->middleware('auth:api');

//Route for updating the given plaga
Route::put('/plagas/{id}', 'PlagaController@update')->middleware('auth:api');

//Route for deleting the given plaga
Route::delete('/plagas/{id}', 'PlagaController@destroy')->middleware('auth:api');

/**
 * PLAGA END
 */

/**
 * VARIEDAD BEGIN
 */

//Route for creating new variedad
Route::post('/variedades', 'VariedadController@store')->middleware('auth:api');

//Route for getting the entire list of variedades
Route::get('/variedades/todos', 'VariedadController@showAll')->middleware('auth:api');

//Route for getting the variedad with given id
Route::get('/variedades/{id}', 'VariedadController@show')->middleware('auth:api');

//Route for getting the paginated list of variedades
Route::get('/variedades', 'VariedadController@index')->middleware('auth:api');

//Route for updating the given variedad
Route::put('/variedades/{id}', 'VariedadController@update')->middleware('auth:api');

//Route for deleting the given variedad
Route::delete('/variedades/{id}', 'VariedadController@destroy')->middleware('auth:api');

/**
 * VARIEDAD END
 */

