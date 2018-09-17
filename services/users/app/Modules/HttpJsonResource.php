<?php

namespace App\Modules;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Enum\AuthorizationStatusEnum;
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
    private $status = null;

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
        $this->status = $status;
    }

    /**
     * Set Authorization response status as NotFound
     * 
     * @return void
     */
    public function resourceNotFound ($status) {
        $this->status = AuthorizationStatusEnum::ResourceNotFound;
    }

    /**
     * Set Authorization response status as OK
     * 
     * @return void
     */
    public function resourceOK ($status) {
        $this->status = AuthorizationStatusEnum::OK;
    }

    /**
     * Set Authorization response status as Unauthorized
     * 
     * @return void
     */
    public function resourceUnauthorized ($status) {
        $this->status = AuthorizationStatusEnum::Unauthorized;
    }

    /**
     * Set Authorization response status as InvalidToken
     * 
     * @return void
     */
    public function resourceInvalidToken ($status) {
        $this->status = AuthorizationStatusEnum::InvalidToken;
    }


    /**
     * Return Authorization response status
     */
    public function getStatus () {
        if ($this->status == null) {
            return AuthorizationStatusEnum::Unsetted;
        }
        return $this->status;
    }

    /**
     * Get Authorization status message based on AuthorizationStatusEnum
     * 
     * @return string
     * 
     */
    public function getStatusMessage () {
        return AuthorizationStatusEnum::getKey(
            $this->getStatus()
        );
    }

    /**
     * Status Enum is utilized as http response data
     * 
     * @return int
     */
    public function getStatusHttpCode () {
        return $this->getStatus();
    }

    public function httpResponse () {
        return $this
            ->response()
            ->setStatusCode($result->getStatusHttpCode());
    }

}
