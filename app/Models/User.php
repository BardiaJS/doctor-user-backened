<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use PhpParser\Comment\Doc;
use App\Models\Doctor\Doctor;
use App\Models\Patient\Patient;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable , HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'national_id',
        'first_name',
        'last_name',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    protected $attributes = [
        'is_doctor' => false
    ];

    public function patient(){
        return $this->hasOne(Patient::class , 'user_id' , 'id');
    }

    public function doctor(){
        return $this->hasOne(Doctor::class , 'user_id' , 'id');
    }
    
}
