<?php

namespace App\Modules\Hero;

use App\Modules\CacheableModel as Model;
use Illuminate\Support\Facades\Redis;

class Hero extends Model
{
    //
    protected $collection = 'heroes';
    protected $fillable = ['name'];
}
