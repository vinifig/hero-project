<?php

namespace App\Modules\Hero;

use Jenssegers\Mongodb\Eloquent\Model;

class Hero extends Model
{
    //
    protected $collection = 'heroes';
    protected $fillable = ['name'];
}
