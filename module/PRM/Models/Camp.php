<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;

class Camp extends Model
{
    protected $table = 'camps';

    protected $guarded = [];


    public function scopeApiQuery($query)
    {
        $query->active();
    }

    /*
     |--------------------------------------------------------------------------
     | GET TABLE NAME
     |--------------------------------------------------------------------------
    */
    public static function getTableName()
    {
        return with(new static)->getTable();
    }
}
