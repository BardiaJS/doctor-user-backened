<?php

namespace App\Models\Patient;

use App\Models\Reserve\Reserve;
use App\Models\User;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{

    protected $fillable = [
        'user_id',
        'insurance_number',
        'type_of_insurance',
        'medical_history',
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reserve(){
        return $this->hasOne(Reserve::class , 'patient_id' , 'id');
    }


}
