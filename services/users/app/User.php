<?php

namespace App;

use App\Modules\Aggregation\IAggregateable;

use App\Modules\User\Aggregation\UserHeroAggregation;

use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements IAggregateable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function encrypt ($password) {
        
        return md5($password);
    }

    public function token() {
        $this->token = str_random(60);
        $this->save();
    }


    // IAggregation Interface Implementations

    /**
     * Return a list of aggregations of a instance
     * @return array
     */
    public function aggregationList() {
        return [
            new UserHeroAggregation()
        ];
    }

    /**
     * Return the aggregation identifier
     * 
     * For users the aggregation identifier is Id
     * @return int
     */
    public function aggregationId () {
        return $this->id;
    }
}
