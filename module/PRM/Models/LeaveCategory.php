<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;

class LeaveCategory extends Model
{
    protected $table = 'leave_categories';

    function leave_application(){
        return $this->hasMany(LeaveApplication::class);
    }
}
