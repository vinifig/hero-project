<?php

namespace App\Modules\Aggregation;

/**
 * Aggregation class. 
 * Any Aggregation class should extends this class
 * 
 * Aggregation defines:
 *  - aggregation methods that should be implemented
 *  - Utils functions like $httpResourceCaller
 *  
 */
interface IAggregateable
{
    /**
     * Get Aggregation Instance list
     * @return array
     */
    public function aggregationList();

    /**
     * returns the main key of aggregator object
     * @return avoid
     */
    public function aggregationId();
}
