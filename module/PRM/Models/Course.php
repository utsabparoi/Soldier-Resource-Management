<?php

namespace Module\PRM\Models;

use App\Models\User;
use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdated;

class Course extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'courses';

    function user(){
        return $this->belongsTo(User::class);
    }

    public function parade_course(){
        return $this->belongsTo(ParadeCourseModel::class);
    }

}


