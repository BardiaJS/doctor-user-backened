<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Day extends Model
{

    protected $fillable = [
        'doctor_id',
        'day_name',
        'date'
    ];

    public function hours(): HasMany
    {
        return $this->hasMany(Hour::class, 'day_id', 'id');
    }

    public function doctor(): BelongsTo
    {
        return $this->belongsTo(Doctor::class, 'doctor_id', 'id');
    }
}