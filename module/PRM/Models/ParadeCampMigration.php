<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdated;

class ParadeCampMigration extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'parade_camp_migrations';

    public function parade(){
        return $this->belongsTo(ParadeModel::class);
    }

    public function camp(){
        return $this->belongsTo(Camp::class);
    }
}
