<?php

namespace App\Modules\Auth\Authorization;

use App\Resources;
use App\User;
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
     * verify if the resource can be authorized
     * @return Authorization
     */
    public function authorize () {
        if (!Resources::secure($this->resource, $this->action)) {
            //$this->resourceOK();
            //return $this;
        };
        
        if ($this->token == null) {
            $this->resourceUnauthorized();
            return $this;
        }

        if (!User::validToken($this->token)) {
            $this->resourceForbidden();
            return $this;
        }
        $this->resourceOK();
        return $this;
    }

    /**
     * Returns Authorization Response
     * @return array
     */
    public function toArray($request) {
        return [
            'resource' => $this->resource,
            'action' => $this->action,
            'message' => $this->getStatusMessage(),
            'status' => $this->getStatusHttpCode()
        ];
    }

}
