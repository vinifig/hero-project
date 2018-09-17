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

Route::get('/', function () {
    return response()->json([
        'Hello' => ', World!'
    ], 200);
});
