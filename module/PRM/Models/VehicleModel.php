<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdated;
use Module\PRM\Models\Model;

class VehicleModel extends Model
{
    use AutoCreatedUpdated;
    protected $table = 'vehicles';
}
