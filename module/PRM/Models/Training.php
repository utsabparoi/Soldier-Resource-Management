<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdatedforCustomMiddleware;
use Module\PRM\Models\Model;


class Training extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;
    protected $table = 'trainings';

    function training_category(){
        return $this->belongsTo(TrainingCategory::class);
    }
}
