<?php

namespace App\Modules;

use Illuminate\Http\Resources\Json\JsonResource;
use  App\Modules\Auth\Authorization\Enum\AuthorizationStatusEnum;
use \Symfony\Component\Routing\Exception\InvalidParameterException;
/**
 * Authorization data
 * @property string $route
 * @property string $action
 * @property string $token
 * @property AuthorizationStatusEnum $status
 */
abstract class HttpJsonResource extends JsonResource
{
    private $status = AuthorizationStatusEnum::Unsetted;

    /**
     * Set Authorization response status
     * 
     * 
     * @param AuthorizationStatusEnum $status
     * 
     * @throws InvalidParameterException
     * 
     * @return void
     */
    public function setStatus ($status) {
        if ($status === AuthorizationStatusEnum::Unsetted) {
            throw new InvalidParameterException('$status cannot be setted as Unsetted');
        }
        $this->$status = $status;
    }

    /**
     * Get Authorization status message based on AuthorizationStatusEnum
     * 
     * @return string
     * 
     */
    public function getStatusMessage () {
        return AuthorizationStatusEnum::getKey($status);
    }

    /**
     * Status Enum is utilized as http response data
     * 
     * @return int
     */
    public function getStatusHttpCode () {
        return $status;
    }

}
