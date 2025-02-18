<?php

namespace App\Http\Controllers\Reserve;

use App\Models\Doctor;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Reserve\ReserveResource;
use App\Http\Requests\Reserve\CreateReserveRequest;
use App\Http\Requests\Reserve\UpdateReserveRequest;

class ReserveController extends Controller
{
    public function create_reserve(Doctor $doctor, CreateReserveRequest $request)
    {
        $validated = $request->validated();
        $reserve = Reserve::create([
            'patient_id' => Auth::user()->id,
            'doctor_id' => $doctor->id,
            'visit_hour' => $validated['visit_hour'],
            'visit_date' => $validated['visit_date'],
            'visit_day' => $validated['visit_day']
        ]);

        return new ReserveResource($reserve);
    }

    public function delete_reserve(Reserve $reserve)
    {

        if (($reserve->patient_id == Auth::user()->patient->id) && ((bool)$reserve->doctor_id)) {
            $reserve->delete();
            return response()->json([
                'message' => 'reserve deleted successfylly'
            ]);
        } else {
            return response()->json([
                'message' => "You cannot update other person's reserve!"
            ]);
        }
    }
}