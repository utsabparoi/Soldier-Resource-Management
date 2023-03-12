<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;


class Camp extends Model
{
    protected $table = 'camps';

    //There are few things here which are extending from superclass(Model.php)

    function training(){
        return $this->belongsTo(Training::class, "training_id");
    }

}
