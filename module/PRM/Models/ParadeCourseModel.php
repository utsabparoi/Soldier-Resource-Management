<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class ParadeCourseModel extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;

    protected $table = 'parade_courses';

    public function course(){
        return $this->belongsTo(Course::class);
    }

    public function parade(){
        return $this->belongsTo(Course::class);
    }

}
