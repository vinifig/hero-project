<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes - Auth
|--------------------------------------------------------------------------
|
| Here is where you can register any auth related route. 
|
*/

// // Registration Endpoint
// Route::any('/', function (Request $request) {
//     return response()->json([
//         'Resource not found.'
//     ], 404);
// });

// Authorization Endpoint
Route::get('/authorization/{resource}/{action}', 'AuthorizationController@getResourceAuthorization');
