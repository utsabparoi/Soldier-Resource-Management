<?php

namespace Module\PRM\Models;

use Module\PRM\Models\Model;
use App\Traits\AutoCreatedUpdated;

class OrganizationInfo extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'organization_infos';

    function user(){
        return $this->belongsTo(User::class);
    }

}
