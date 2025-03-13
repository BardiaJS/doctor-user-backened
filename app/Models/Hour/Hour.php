<?php

namespace App\Models\Hour;

use App\Models\Time\Time;
use Illuminate\Database\Eloquent\Model;

class Hour extends Model
{
    


    public function time(){
        return $this->belongsTo(Time::class , 'time_id' , 'id');
    }
}
