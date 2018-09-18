<?php

namespace App\Http\Controllers;

use App\Modules\Aggregation\Aggregator;
use App\Modules\Aggregation\IAggregateable;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function requestData(Request $request) {
        return $request->all();
    }

    protected function aggregate (IAggregateable $aggregateableInstance) {
        return $this
            ->aggregator()
            ->aggregate($aggregateableInstance);
    }

    protected function aggregator () {
        return new Aggregator();
    }
}
