<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class visitor extends Model
{
    protected $fillable = [
        'name',
        'email',
        'mobile_no',
        'address',
        'meet_person_name',
        'department',
        'reason_to_meet',
        'enter_time',
        'out_time',
    ];

  
}
