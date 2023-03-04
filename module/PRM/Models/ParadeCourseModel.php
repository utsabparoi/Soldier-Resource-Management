<?php

namespace Module\PRM\Models;


class ParadeCourseModel extends Model
{
    protected $table = 'parade_courses';

    function course(){
        return $this->belongsTo(Course::class, "course_id");
    }
}
