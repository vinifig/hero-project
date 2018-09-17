<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes - Authentication
|--------------------------------------------------------------------------
|
| Here is where you can register any authentication related route. 
|
*/

// Authentication Endpoint
Route::post('/', 'AuthenticationController@login');