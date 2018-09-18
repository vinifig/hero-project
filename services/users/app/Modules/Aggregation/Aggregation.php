<?php

namespace App\Modules\Aggregation;

/**
 * Aggregation class. 
 * Any Aggregation class should extends this class
 * 
 * Aggregation defines:
 *  - aggregation methods that should be implemented
 *  - Utils functions like resourceLink
 *  
 */
abstract class Aggregation
{
    /**
     * responsible to obtain the respective resource link
     * resource link generator
     * @param string $resource - Name of resource
     * @param any $id - unique identifier. Can be null
     */
    protected function resourceLink ($resource, $id = null) {
        
        // it should be refactored. but i really don't know how
        
        $baseLink = env('APP_URL', '/');
        $baseLink .= 'api/';

        $resourceLink = $baseLink;

        switch ($resource) {
            case 'user/hero':
            default:
                $resourceLink .= $resource;
                break;
        }
        if ($id !== null) {
            $resourceLink .= '/' . $id;
        }

        return $resourceLink;
    }


    /**
     * returns the aggregation key
     * 
     * The aggregation key is the 
     * Hateoas response key
     */
    abstract public function key ();

    /**
     * returns the aggregation value
     * 
     * The aggregation key is the 
     * Hateoas aggregation value
     * @param any $aggregationId - the integration, or aggregation unique key
     * @return any
     */
    abstract public function value ($aggregationId);
}
