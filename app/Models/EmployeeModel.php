<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    public $table = 'employee';
    public $primaryKey = 'id';
    public $incrementing = true;
    public $keyType = 'int';
    public $timestamps = true;
    //use HasFactory;
}
