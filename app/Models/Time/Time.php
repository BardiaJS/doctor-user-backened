<?php

namespace App\Models\Time;

use App\Models\Hour\Hour;
use App\Models\Doctor\Doctor;
use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    protected $fillable = [
        'doctor_id',
        'day',
        'month',
        'year',
    ];

    public function doctor(){
        return $this->belongsTo(Doctor::class , 'doctor_id' , 'id');
    }

    public function hour(){
        return $this->hasOne(Hour::class , 'time_id' , 'id');
    }
}
