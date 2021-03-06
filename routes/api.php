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

/**
 * Coordenada BEGIN
 */

//Route for creating new coordenada
Route::post('/coordenadas', 'CoordenadaController@store')->middleware('auth:api');

//Route for getting the entire list of coordenadas
Route::get('/coordenadas/todos', 'CoordenadaController@showAll')->middleware('auth:api');

//Route for getting the coordenada with given id
Route::get('/coordenadas/{id}', 'CoordenadaController@show')->middleware('auth:api');

//Route for getting the paginated list of coordenadas
Route::get('/coordenadas', 'CoordenadaController@index')->middleware('auth:api');

//Route for updating the given coordenada
Route::put('/coordenadas/{id}', 'CoordenadaController@update')->middleware('auth:api');

//Route for deleting the given coordenada
Route::delete('/coordenadas/{id}', 'CoordenadaController@destroy')->middleware('auth:api');

/**
 * COORDENADA END
 */

/**
 * Ettp BEGIN
 */

//Route for creating new ettp
Route::post('/ettps', 'EttpController@store')->middleware('auth:api');

//Route for getting the entire list of ettps
Route::get('/ettps/todos', 'EttpController@showAll')->middleware('auth:api');

//Route for getting the ettp with given id
Route::get('/ettps/{id}', 'EttpController@show')->middleware('auth:api');

//Route for getting the paginated list of ettps
Route::get('/ettps', 'EttpController@index')->middleware('auth:api');

//Route for updating the given ettp
Route::put('/ettps/{id}', 'EttpController@update')->middleware('auth:api');

//Route for deleting the given ettp
Route::delete('/ettps/{id}', 'EttpController@destroy')->middleware('auth:api');

/**
 * EMPRESA END
 */

//Route for creating new empresa
Route::post('/empresas', 'EmpresaController@store')->middleware('auth:api');

//Route for getting the entire list of empresas
Route::get('/empresas/todos', 'EmpresaController@showAll')->middleware('auth:api');

//Route for getting the empresa with given id
Route::get('/empresas/{id}', 'EmpresaController@show')->middleware('auth:api');

//Route for getting the paginated list of empresas
Route::get('/empresas', 'EmpresaController@index')->middleware('auth:api');

//Route for updating the given empresa
Route::put('/empresas/{id}', 'EmpresaController@update')->middleware('auth:api');

//Route for deleting the given empresa
Route::delete('/empresas/{id}', 'EmpresaController@destroy')->middleware('auth:api');

/**
 * EMPRESA END
 */

/**
 * UEB BEGIN
 */

//Route for creating new empresa
Route::post('/uebs', 'UebController@store')->middleware('auth:api');

//Route for getting the entire list of uebs
Route::get('/uebs/todos', 'UebController@showAll')->middleware('auth:api');

//Route for getting the ueb with given id
Route::get('/uebs/{id}', 'UebController@show')->middleware('auth:api');

//Route for getting the paginated list of uebs
Route::get('/uebs', 'UebController@index')->middleware('auth:api');

//Route for updating the given ueb
Route::put('/uebs/{id}', 'UebController@update')->middleware('auth:api');

//Route for deleting the given ueb
Route::delete('/uebs/{id}', 'UebController@destroy')->middleware('auth:api');

/**
 * UEB END
 */

/**
 * FENOLOGIA BEGIN
 */

//Route for creating new empresa
Route::post('/fenologias', 'FenologiaController@store')->middleware('auth:api');

//Route for getting the entire list of fenologias
Route::get('/fenologias/todos', 'FenologiaController@showAll')->middleware('auth:api');

//Route for getting the fenologia with given id
Route::get('/fenologias/{id}', 'FenologiaController@show')->middleware('auth:api');

//Route for getting the paginated list of fenologias
Route::get('/fenologias', 'FenologiaController@index')->middleware('auth:api');

//Route for updating the given fenologia
Route::put('/fenologias/{id}', 'FenologiaController@update')->middleware('auth:api');

//Route for deleting the given fenologia
Route::delete('/fenologias/{id}', 'FenologiaController@destroy')->middleware('auth:api');

/**
 * FENOLOGIA END
 */

