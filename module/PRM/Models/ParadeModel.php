<?php

namespace Module\PRM\Models;


class ParadeModel extends Model
{
    protected $table = 'parades';

    function leave_application(){
        return $this->hasMany(LeaveApplication::class);
    }
}
