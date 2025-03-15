<?php

namespace App\Models\Reserve;

use App\Models\User;
use App\Models\Doctor\Doctor;
use App\Models\Patient\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reserve extends Model
{
    
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'date',
        'hour',
    ];



    public function user():HasOne{
        return $this->hasOne(Patient::class , 'patient_id' , 'id');
    }

    public function doctor():HasOne{
        return $this->hasOne(Doctor::class , 'doctor_id' , 'id');
    }
}
