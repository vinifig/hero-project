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

Route::get('/', 'HeroController@getAll');
Route::get('/{id}', 'HeroController@get');


Route::post('/', 'HeroController@insert');

Route::patch('/{id}', 'HeroController@update');

Route::delete('/{id}', 'HeroController@delete');