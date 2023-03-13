<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;

class APRModel extends Model
{
    protected $table = 'aprs';

    public function parade(){
        return $this->belongsTo(ParadeModel::class, 'parade_id');
    }
}
