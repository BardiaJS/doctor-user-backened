<?php

namespace App\Http\Controllers\Time;

use App\Models\Time\Time;
use Illuminate\Http\Request;
use App\Models\Doctor\Doctor;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Time\TimeResource;
use App\Http\Requests\Time\CreateTimeRequest;

class TimeController extends Controller
{
    public function set_time(Doctor $doctor , CreateTimeRequest $createTimeRequest){
        if (Auth::user()->is_doctor){

            $doctor_id =$doctor->id;

            $isDoctorUnique = !Time::where('doctor_id', $doctor_id)->exists();

            $validated = $createTimeRequest->validated();

            if($isDoctorUnique){
                
                $time = Time::create(
                [
                    'doctor_id' => $doctor_id,
                    'day' => $validated['day'],
                    'month' => $validated['month'],
                    'year' => $validated['year']
                ]);
                return new TimeResource($time);
            }else{
                return response()->json(['error' => 'This doctor already has a time settings!'], 409);
            }
        }else{
            return response()->json(['error' => 'You are not doctor to have access for this part of site!'], 409);
        }
    }
}
