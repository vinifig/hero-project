<?php

namespace App\Modules\User\Aggregation;

use App\Modules\Aggregation\Aggregation;

/**
 * UserHeroAggregation class. 
 * 
 * Responsible to get all heroes created by user
 *  
 */
class UserHeroAggregation extends Aggregation
{
    /**
     * returns the aggregation key
     * 
     * The aggregation key is the 
     * Hateoas response key
     */
    public function key () {
        return 'heroes';
    }



    /**
     * returns the aggregation value
     * userheroaggregation value is a link to respective user heroes list
     * 
     * The aggregation key is the 
     * Hateoas aggregation value
     * @param any $aggregationId - the integration, or aggregation unique key
     * @return any
     */
    function value ($aggregationId) {
        return $this->resourceLink('user/hero', $aggregationId);
    }
}
