<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resources extends Model
{
    //
    protected $fillable = ['name', 'secure', 'action'];

    /**
     * Returns if a resource action needs authorization
     * @return boolean
     */
    public static function secure ($name, $action) {
        $resource = self::find($name, $action);
        $isSecureResource = $resource !== null && $resource->secure;
        
        return $isSecureResource;
    }

    public static function find ($name, $action) {
        return Resources::where('name', $name)
            ->where('action', $action)
            ->first();
    }
}
