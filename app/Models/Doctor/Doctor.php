<?php

namespace App\Models\Doctor;

use App\Models\User;
use App\Models\Time\Time;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'category',
        'record',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function time(){
        return $this->hasOne(Time::class , 'doctor_id' , 'id');
    }
}
