<?php

namespace App\Http\Controllers\Auth;

use App\Modules\Auth\Authorization\AuthorizationServiceProvider as AuthorizationProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthorizationController extends Controller
{

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
        $token = 'token';
        
        $validationData = [
            'token' => $token,
            'resource' => $resource,
            'action' => $action
        ];
        
        // Here goes the authorization logic.
        $result = AuthorizationProvider::authorize($validationData);
        
        return $result
            ->response()
            ->setStatusCode($result->getStatusHttpCode());

    }
    
}
