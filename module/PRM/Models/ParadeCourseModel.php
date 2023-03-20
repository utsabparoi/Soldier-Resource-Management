<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Course;
use Module\PRM\Models\ParadeModel;
use App\Traits\AutoCreatedUpdated;

class ParadeCourseModel extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'parade_courses';

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function parade(){
        return $this->belongsTo(ParadeModel::class);
    }

}
