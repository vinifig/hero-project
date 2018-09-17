<?php

namespace App\Modules\Auth\Authentication;
use App\User;

interface IAuthenticationProvider {
    /**
     * Method to be called when a user is registered or authenticated
     */
    public function authenticate(User $user);
}