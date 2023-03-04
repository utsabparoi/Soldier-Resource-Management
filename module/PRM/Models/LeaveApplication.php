<?php

namespace Module\PRM\Models;

use App\Models\User;
use Module\PRM\Models\Model;
use Module\PRM\Models\ParadeModel;
use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class LeaveApplication extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;

    protected $table = 'leave_applications';

    // Relationship
    function parade(){
        return $this->belongsTo(ParadeModel::class);
    }

    function camp(){
        return $this->belongsTo(Camp::class);
    }

    function leave_category(){
        return $this->belongsTo(LeaveCategory::class);
    }

    

    function user(){
        return $this->belongsTo(User::class);
    }
}
