<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class Rank extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;
    protected $table = 'ranks';
}
