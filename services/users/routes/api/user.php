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

Route::get('/', function () {
    return response()->json([
        'Hello' => ', World!'
    ], 200)
});
