<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class CompanyInfo extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;

    protected $table = 'courses';

    function user(){
        return $this->belongsTo(User::class);
    }
}
