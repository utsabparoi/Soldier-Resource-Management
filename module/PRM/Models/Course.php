<?php

namespace Module\PRM\Models;

use App\Models\User;
use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class Course extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;

    protected $table = 'courses';

    function user(){
        return $this->belongsTo(User::class);
    }

}


