<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdated;

class CompanyInfo extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'courses';

    function user(){
        return $this->belongsTo(User::class);
    }
}
