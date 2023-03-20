<?php

namespace Module\PRM\Models;

use App\Traits\AutoCreatedUpdated;
use Module\PRM\Models\Model;

class AppointmentHolder extends Model
{
    use AutoCreatedUpdated;

    protected $table = 'appointment_holders';

    //There are few things here which are extending from superclass(Model.php)
}
