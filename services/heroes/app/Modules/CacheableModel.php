<?php

namespace App\Modules;

use Illuminate\Support\Facades\Redis;
use Jenssegers\Mongodb\Eloquent\Model;

class CacheableModel extends Model
{
    protected static $name = 'cacheable:';

    private static function _resourceName ($id) {
        return self::$name . ":$id";
    }

    public static function deleteCached ($id) {
        $resourceName = self::_resourceName($id);
        Redis::set($resourceName, '');
    }

    public static function saveCache ($id, $data) {
        $resourceName = self::_resourceName($id);
        Redis::set($resourceName, $data);
    }

    public static function getCached($id) {
        $resourceName = self::_resourceName($id);
        $cached = Redis::get($resourceName);
        if ($cached == '') {
            return null;
        }
        return json_decode($cached);
    }
}
