<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdated;
use Module\PRM\Models\Model;


class Training extends Model
{
    use AutoCreatedUpdated;
    protected $table = 'trainings';

    function training_category(){
        return $this->belongsTo(TrainingCategory::class);
    }
}
