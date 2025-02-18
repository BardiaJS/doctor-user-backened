<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use HasFactory, Notifiable, HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Patient extends Model
{
    protected $fillable = [
        'user_id',
        'type_of_insurance',
        'insurance_number'
    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function reserve(): HasOne
    {
        return $this->hasOne(Reserve::class, 'patient_id', 'id');
    }

    public function medicine(): HasMany
    {
        return $this->hasMany(Medicine::class, 'patient_id', 'id');
    }

    public function illnesses(): HasMany
    {
        return $this->hasMany(Illness::class, 'patient_id', 'id');
    }
}