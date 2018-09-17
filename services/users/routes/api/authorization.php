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

// // Registration Endpoint
// Route::any('/', function (Request $request) {
//     return response()->json([
//         'Resource not found.'
//     ], 404);
// });

// Authorization Endpoint
Route::get('/{resource}/{action}', 'AuthorizationController@getResourceAuthorization');
