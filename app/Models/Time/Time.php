<?php

namespace App\Models\Time;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
        'doctor_id',
        'day',
        'month',
        'year',
    ];
}
