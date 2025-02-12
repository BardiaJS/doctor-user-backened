<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doctor extends Model
{
    public function reserve(): HasOne
    {
        return $this->hasOne(Reserve::class, 'cotor_id', 'id');
    }

    public function time(): HasOne
    {
        return $this->hasOne(Time::class, 'doctor_id', 'id');
    }
}