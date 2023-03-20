<?php

namespace Module\PRM\Models;

use App\Models\User;
use Module\PRM\Models\Model;
use Module\PRM\Models\ParadeModel;
use App\Traits\AutoCreatedUpdated;

class LeaveApplication extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'leave_applications';

    // Relationship
    function parade(){
        return $this->belongsTo(ParadeModel::class,'parade_id');
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
