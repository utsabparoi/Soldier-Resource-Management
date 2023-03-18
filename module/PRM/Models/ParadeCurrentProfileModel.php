<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Camp;
use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class ParadeCurrentProfileModel extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;
    protected $table = 'parade_current_profiles';

    public function camp(){
        return $this->belongsTo(Camp::class);
    }
    public function rank(){
        return $this->belongsTo(Rank::class);
    }
    public function state(){
        return $this->belongsTo(ParadeStateModel::class);
    }
    public function leaveCategory(){
        return $this->hasManyThrough(LeaveCategory::class, LeaveApplication::class, 'leave_application_id', '	leave_category_id');
    }
}
