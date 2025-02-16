<?php

namespace App\Http\Controllers\Day;

use App\Models\Day;
use App\Models\Doctor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Day\CreateDayRequest;
use App\Http\Requests\Day\UpdateDayRequest;
use App\Http\Resources\Day\DayResource;

class DayController extends Controller
{
    public function create_day(CreateDayRequest $request, Doctor $doctor)
    {
        if (Auth::user()->doctor) {
            if (Auth::user()->doctor->id == $doctor->id) {
                $validated = $request->validated();
                $day = Day::create([
                    'day_name' => $validated['day_name'],
                    'date' => $validated['date'],
                    'doctor_id' => $doctor->id
                ]);
                return new DayResource($day);
            } else {
                abort(403, "You cannot create a day for other doctor!");
            }
        } else {
            abort(403, "You are a user! You cannot create a day for a doctor!");
        }
    }


    public function delete_day(Day $day)
    {
        if (Auth::user()->doctor) {
            if (Auth::user()->doctor->id == $day->doctor_id) {
                $day->delete();
                return response()->json([
                    "message" => "deleted a day successfully!"
                ]);
            } else {
                abort(403, "You cannot delete a day for other doctor!");
            }
        } else {
            abort(403, "You are a user! You cannot delete a day for a doctor!");
        }
    }

    public function update_day(Day $day, UpdateDayRequest $request)
    {
        if (Auth::user()->doctor) {
            if (Auth::user()->doctor->id == $day->doctor_id) {
                $validated = $request->validated();
                $day->update($validated);
                return new DayResource($day);
            } else {
                abort(403, "You cannot create a day for other doctor!");
            }
        } else {
            abort(403, "You are a user! You cannot create a day for a doctor!");
        }
    }
}