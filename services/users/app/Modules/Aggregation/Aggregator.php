<?php

namespace App\Modules\Aggregation;

/**
 * Aggregator class. 
 * A factory to return a list of aggregation responses
 * 
 * Should be used for hateoas
 * 
 */
class Aggregator
{
    /**
     * abstract class 
     */
    public function aggregate(IAggregateable $instance) { 
        $aggregations = $instance->aggregationList();
        $aggregationId = $instance->aggregationId();
        $aggregated = [];
        
        foreach ($aggregations as $aggregation) {
            $aggregated[$aggregation->key()] = $aggregation->value($aggregationId);
        }
        
        return $aggregated;
    }
}
