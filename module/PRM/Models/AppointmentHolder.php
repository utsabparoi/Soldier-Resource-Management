<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdatedforCustomMiddleware;
use Module\PRM\Models\Model;

class AppointmentHolder extends Model
{
    use AutoCreatedUpdatedforCustomMiddleware;
    
    protected $table = 'appointment_holders';

    //There are few things here which are extending from superclass(Model.php)
}
