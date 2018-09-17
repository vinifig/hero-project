<?php

namespace App\Modules\Auth\Authentication;

use App\User;

class AuthenticationServiceProvider implements IAuthenticationProvider {
    private function onAuthenticated (User $user) {
        $token = $user->token();
        return $user;
    }

    public function authenticate(User $user) {
        return $this->onAuthenticated($user);
    }
}