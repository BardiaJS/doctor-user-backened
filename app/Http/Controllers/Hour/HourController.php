<?php

namespace App\Http\Controllers\Hour;

use App\Models\Hour\Hour;
use App\Models\Time\Time;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Hour\HourResource;
use App\Http\Requests\Hour\CreateHourRequest;
use App\Http\Requests\Hour\UpdateHourRequest;

class HourController extends Controller
{

    public function delete_hour(Hour $hour){
        if(Auth::user()->is_doctor == 1){
            if(Auth::user()->doctor->id == $hour->time->doctor_id){
                $hour->delete();
                return response()->json(["message" => "Deleted Successfully!"]);
            }else{
                return response()->json(["error" => "You cannot delete other doctor's time setting!"]);
            }
        }else{
            return response()->json(["error" => "You are a user!"]);
        }
    }
    public function update_hour(Hour $hour  , UpdateHourRequest $updateHourRequest){
        if(Auth::user()->is_doctor == 1){
            if(Auth::user()->doctor->id == $hour->time->doctor_id){
                $validated = $updateHourRequest->validated();
                $hour->update($validated);
                return new HourResource($hour);
            }else{
                return response()->json(["error" => "You cannot change other doctor's hours!"] , 403);
            }
        }else{
            return response()->json(["error" => "You are a user! "] , 403);
        }
    }
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
