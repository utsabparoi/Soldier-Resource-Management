<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class ParadeModel extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;

    protected $table = 'parades';

    function leave_application(){
        return $this->belongsTo(LeaveApplication::class);
    }

    public function camp(){
        return $this->belongsTo(Camp::class, 'present_location');
    }
}
