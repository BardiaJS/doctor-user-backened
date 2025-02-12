<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use HasFactory, Notifiable, HasApiTokens;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
}