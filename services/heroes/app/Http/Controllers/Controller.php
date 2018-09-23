<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    function JSONResponse ($response, $status) {
        return response()
            ->json($response, $status);
    }

    function messageResponse ($response, $status) {
        return $this->JSONResponse([
                'status' => $status,
                'message' => $response
            ], $status);
    }

    protected function ok($resource) {
        return $this->JSONResponse($resource, 200);
    }

    protected function created ($resource) {
        return $this->JSONResponse($resource, 201);
    }

    protected function noContent () {
        return $this->JSONResponse(null, 204);
    }

    protected function resourceNotFound () {
        return $this->messageResponse('Error: Resource not found', 404);
    }

}
