<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes - User
|--------------------------------------------------------------------------
|
| Here is where you can register any user related route.
| Registration, get profile and related. 
|
*/

// Registration
Route::Post('/', 'UserController@create');
