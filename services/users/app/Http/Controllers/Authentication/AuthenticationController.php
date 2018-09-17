<?php

namespace App\Http\Controllers\Authentication;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthenticatableController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Validator;

class AuthenticationController extends AuthenticatableController
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles Authorization operations for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
     * Get a validator for an incoming login request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:6',
        ]);
    }


    /**
     * Authenticate a user with the system
     * 
     * @param Request
     */
    public function login(Request $request)
    {
        $data = $this->requestData($request);
        $this->validator($data)->validate();
        
        $usersResult = User::where('email', '=', $data['email'])->take(1)->get();
        $count = $usersResult->count();
        
        if ($count !== 1) {
            return $this->sendFailedLoginResponse($request);
        }

        $user = $usersResult[0];//->toArray()[0];
        $encryptedPass = User::encrypt($data['password']);
        
        if ($user['password'] !== $encryptedPass) {
            return $this->sendFailedLoginResponse($request);
        }
        
        $authenticated = $this->authenticate($user);

        return response()
            ->json([
                'data' => $authenticated->toArray()
            ], 201);

        // return $this->sendFailedLoginResponse($request);
    }
}
