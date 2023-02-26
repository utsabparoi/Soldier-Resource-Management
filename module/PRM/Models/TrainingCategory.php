<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;

class TrainingCategory extends Model
{
    protected $table = 'training_categories';

    function training(){
        return $this->hasMany(Training::class);
    }
}


