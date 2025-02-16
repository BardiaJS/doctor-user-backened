<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Doctor extends Model
{
    protected $fillable = [
        'user_id',
        'category',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
    public function reserve(): HasOne
    {
        return $this->hasOne(Reserve::class, 'doctor_id', 'id');
    }



    public function works(): HasMany
    {
        return $this->hasMany(Work::class, 'doctor_id', 'id');
    }

    public function days(): HasMany
    {
        return $this->hasMany(Day::class, 'doctor_id', 'id');
    }
}