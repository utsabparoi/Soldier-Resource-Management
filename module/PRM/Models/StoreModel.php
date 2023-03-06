<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdatedforCustomMiddleware;
use Module\PRM\Models\Model;


class StoreModel extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;
    protected $table = 'stores';
}
