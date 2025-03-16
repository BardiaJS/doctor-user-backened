<?php

namespace App\Http\Controllers\Time;

use Carbon\Carbon;
use App\Models\Time\Time;
use Illuminate\Http\Request;
use App\Models\Doctor\Doctor;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Time\TimeResource;
use App\Http\Requests\Time\CreateTimeRequest;
use App\Http\Requests\Time\UpdateTimeRequest;

class TimeController extends Controller
{

    public function delete_time(Time $time){
        if(Auth::user()->is_doctor == 1){
            if(Auth::user()->doctor->id == $time->doctor_id){
                $time->delete();
                return response()->json(["message" => "Deleted Successfully!"]);
            }else{
                return response()->json(["error" => "You cannot delete other doctor's time setting!"]);
            }
        }else{
            return response()->json(["error" => "You are a user!"]);
        }
    }
    public function update_time(Time $time , UpdateTimeRequest $updateTimeRequest){
        if(Auth::user()->is_doctor == 1){
            if($time->doctor_id == Auth::user()->doctor->id){
                $validated = $updateTimeRequest->validated();
                $validated['date'] = Carbon::createFromFormat('d-m-Y', $validated['date'])->format('Y-m-d');
                $time->update($validated);
                return new TimeResource($time);
            }else{
                return response()->json(["error" => "you can not change other doctor's time setting!"] , 403);
            }
        }else{
            return response()->json(["error" => "You are not a doctor!"] , 403);
        }
    }
    public function set_time(Doctor $doctor , CreateTimeRequest $createTimeRequest){
        if (Auth::user()->is_doctor){
            $doctor_id =$doctor->id;
            $isDoctorUnique = !Time::where('doctor_id', $doctor_id)->exists();
            $validated = $createTimeRequest->validated();
            $validated['date'] = Carbon::createFromFormat('d-m-Y', $validated['date'])->format('Y-m-d');
            if($isDoctorUnique){
                $time = Time::create(
                [
                    'doctor_id' => $doctor_id,
                    'date'=>$validated['date']
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
