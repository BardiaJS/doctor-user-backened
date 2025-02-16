<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reserve extends Model
{
    protected $fillable = [
        'patient_id',
        'doctor_id',
        'start_visit_hour',
        'end_visit_hour',
        'visit_date',
        'visit_day'
    ];
    public function patient(): BelongsTo
    {
        return $this->belongsTo(Patient::class, 'patient_id', 'id');
    }

    public function doctor(): HasOne
    {
        return $this->hasOne(Doctor::class, 'doctor_id', 'id');
    }
}