<?php

namespace Module\PRM\Models;


class ParadeTrainingModel extends Model
{
    protected $table = 'parade_trainings';

    function training(){
        return $this->belongsTo(Training::class, "training_id");
    }
}
