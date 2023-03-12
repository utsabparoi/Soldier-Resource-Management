<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class ParadeCampMigration extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;

    protected $table = 'parade_camp_migrations';
}
