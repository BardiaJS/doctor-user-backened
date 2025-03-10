<?php

namespace App\Models\Patient;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{

    protected $fillable = [
        'user_id',
        'insurance_number',
        'type_of_insurance',
        'medical_history',
    ];
    public function User()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
