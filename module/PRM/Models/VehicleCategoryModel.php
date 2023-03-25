<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdated;
use Module\PRM\Models\Model;

class VehicleCategoryModel extends Model
{
    use AutoCreatedUpdated;
    protected $table = 'vehicle_categories';
}
