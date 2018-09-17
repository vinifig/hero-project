<?php

namespace App\Modules\Auth\Authorization;

use \App\Modules\HttpJsonResource;
use \Symfony\Component\Routing\Exception\InvalidParameterException;

/**
 * Authorization data
 * @property string $route
 * @property string $action
 * @property string $token
 */
class Authorization extends HttpJsonResource
{
    public $resource = null;
    public $action = null;
    public $token = null;
    
    /**
     * Returns Authorization Response
     * @return array
     */
    public function toArray($request) {
        return [
            'resource' => $this->resource,
            'action' => $this->action,
            'token' => $this->token,
            'message' => $this->getStatusMessage(),
            'status' => $this->getStatusHttpCode()
        ];
    }

}
