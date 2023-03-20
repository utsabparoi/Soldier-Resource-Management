<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdated;

class Rank extends Model
{
    use AutoCreatedUpdated;
    protected $table = 'ranks';
}
