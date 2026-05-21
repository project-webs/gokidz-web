<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'parent_name',
        'parent_phone',
        'child_name',
        'child_age',
        'school_name',
        'pickup_address',
        'shuttle_type',
        'status',
    ];
}
