<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdatedforCustomMiddleware;
use Module\PRM\Models\Model;

class Course extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;
    protected $table = 'courses';

}


