<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdated;

class ParadeModel extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'parades';

    function leave_application(){
        return $this->hasMany(LeaveApplication::class,'parade_id');
    }

    public function camp(){
        return $this->belongsTo(Camp::class, 'present_location');
    }

    public function state(){
        return $this->belongsTo(ParadeStateModel::class, 'state_id');
    }

    public function paradeCampMigrations()
    {
        return $this->hasMany(ParadeCampMigration::class, 'parade_id');
    }

    public function activeParadeCampMigration()
    {
        return $this->hasOne(ParadeCampMigration::class, 'parade_id')->where('status', 1);
    }
}
