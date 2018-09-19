<?php

namespace App\Modules\Auth\Authorization;

use App\User;
use App\Enum\AuthorizationStatusEnum;
use App\Modules\Auth\Authorization\Authorization;
use Illuminate\Support\Facades\Validator;

class AuthorizationProvider
{
    /**
     * Get a validator for an incoming authorization request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected static function authorizationValidator(array $data)
    {
        return Validator::make($data, [
            'token' => 'required|string|max:100',
            'resource' => 'required|string|max:50',
            'action' => 'required|string|max:8'
        ]);
    }

    /**
     * Get a resource authorization
     * @param array $data
     * @param string $data['token']
     * @param string $data['resource']
     * @param string $data['action']
     * @return Authorization
     */
    public static function authorize(array $data) {
        self::authorizationValidator($data)->validate();

        // Here goes the authorization logic.

        $authorization = new Authorization([]);
        $authorization->resource = $data['resource'];
        $authorization->action = $data['action'];
        $authorization->token = $data['token'];

        $authorization->authorize();

        return $authorization;
    }
}
