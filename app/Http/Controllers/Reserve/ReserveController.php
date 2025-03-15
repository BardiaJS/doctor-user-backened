<?php

namespace App\Http\Controllers\Reserve;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Hour\Hour;
use App\Models\Time\Time;
use Illuminate\Http\Request;
use App\Models\Doctor\Doctor;
use App\Models\Reserve\Reserve;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hour\CreateHourRequest;
use App\Http\Requests\Reserve\CreateReserveRequest;
use App\Http\Resources\Reserve\ReserveResource;

class ReserveController extends Controller
{
    public function set_reserve(User $user , Time $time , Doctor $doctor , CreateReserveRequest $CreateReserveRequest){
        if($doctor->id == $time->doctor_id){
            $validated = $CreateReserveRequest->validated();
            $validated['date'] = Carbon::createFromFormat('d-m-Y', $validated['date'])->format('Y-m-d');
            $column_name = $validated['hour'];
            $hour = $time->hour;

            $is_taken = $hour->select($column_name)->get();
            // Decode the JSON string into a PHP array
            $data = json_decode($is_taken, true);
            $value = $data[0]["$column_name"];
            if($value == 1){
                $hour->$column_name = 2;
                $hour->save();
                $reserve = Reserve::create([
                    "patient_id" => $user->patient->id,
                    "doctor_id" => $doctor->id
                ]);
                $reserve->update($validated);
                $reserve->save();
                return new ReserveResource($reserve);
            }else if($value == 2){
                return response()->json(['error' =>'it has selected!']);
            }else{
                return response()->json(["error" => "doctor doesn't come in this time!"]);
            }
        }else{
            return response()->json(["error" => "the doctor doesn't have this time!"] , 403);
        }
        
    }
}
