<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;


class Training extends Model
{
    protected $table = 'trainings';

    function training_category(){
        return $this->belongsTo(TrainingCategory::class);
    }
}
