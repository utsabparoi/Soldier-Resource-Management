<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class ParadeTrainingModel extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;
    protected $table = 'parade_trainings';

    function training(){
        return $this->belongsTo(Training::class, "training_id");
    }
}
