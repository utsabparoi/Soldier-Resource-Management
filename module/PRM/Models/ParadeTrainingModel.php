<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdated;

class ParadeTrainingModel extends Model
{
    use AutoCreatedUpdated;
    protected $table = 'parade_trainings';

    function training(){
        return $this->belongsTo(Training::class, "training_id");
    }
}
