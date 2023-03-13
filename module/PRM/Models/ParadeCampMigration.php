<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdatedforCustomMiddleware;

class ParadeCampMigration extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;

    protected $table = 'parade_camp_migrations';

    public function parade(){
        return $this->belongsTo(ParadeModel::class);
    }

    public function camp(){
        return $this->belongsTo(Camp::class);
    }
}
