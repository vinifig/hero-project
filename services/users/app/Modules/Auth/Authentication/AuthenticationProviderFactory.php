<?php

namespace App\Modules\Auth\Authentication;

use App\User;

class AuthenticationProviderFactory  {

    /**
     * Create a AuthenticationProvider defined by his type
     * 
     * @param string $type 
     * 
     * @return IAuthenticationProvider
     */
    public static function create($type) {
        switch ($type) {
            case 'default':
            default:
                return new AuthenticationServiceProvider();
        }
    }
}