<?php

namespace App\Http\Controllers\Hour;

use App\Http\Resources\Hour\HourResource;
use App\Models\Hour\Hour;
use App\Models\Time\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hour\CreateHourRequest;

class HourController extends Controller
{
    public function set_hour(Time $time , CreateHourRequest $createHourRequest){




        $timeId = $time->id;
        $isTimeUnique = !Hour::where('time_id', $timeId)->exists();
        $validated = $createHourRequest->validated();
        if($isTimeUnique){
            $hour = Hour::create(
                ["time_id" => $timeId]
            );
            $hour->update($validated);
            $hour->save();
            return new HourResource($hour);
        }else {
            // Handle the case where the user_id is not unique
            return response()->json(['error' => 'This time already has hour'], 409);
        }
    }   
}
