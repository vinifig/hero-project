<?php

namespace App\Http\Controllers;

use App\User;
use App\Modules\Auth\Authentication\AuthenticationProviderFactory;

abstract class AuthenticatableController extends Controller
{
    protected $authenticationProviderType = 'default';
    
    protected function authenticationProvider () {
        return AuthenticationProviderFactory::create($this->authenticationProviderType);
    }

    protected function authenticate (User $user) {
        $this->guard()->login($user);
        return $this
            ->authenticationProvider()
            ->authenticate($user);
    }

}
