<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes - Authorization
|--------------------------------------------------------------------------
|
| Here is where you can register any authorization related route. 
|
*/

// Authorization Endpoint
Route::get('/{resource}/{action}', 'AuthorizationController@getResourceAuthorization');
