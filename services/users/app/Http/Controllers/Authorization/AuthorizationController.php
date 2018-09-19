<?php

namespace App\Http\Controllers\Authorization;

use App\Modules\Auth\Authorization\AuthorizationProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Authorization Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Authorization operations for the application and 
    | external system. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    
    
    /**
     * Verify if a token can access the resources
     * @param Request $request - Route Request data
     * @param string $resource - Resource name who needs authorization
     * @param string $action - Action of resource who needs authorization
     */
    public function getResourceAuthorization(Request $request, string $resource, string $action) {

        $token = $request->header("Authorization");
        
        $validationData = [
            'token' => $token,
            'resource' => $resource,
            'action' => $action
        ];
        
        $authorization = AuthorizationProvider::authorize($validationData);
        
        return $authorization->httpResponse();  

    }
    
}
