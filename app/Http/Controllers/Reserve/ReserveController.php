<?php

namespace App\Http\Controllers\Reserve;

use App\Models\Doctor;
use App\Models\Reserve;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Reserve\ReserveResource;
use App\Http\Requests\Reserve\CreateReserveRequest;

class ReserveController extends Controller
{
    public function create_reserve(Doctor $doctor, CreateReserveRequest $request)
    {
        $validated = $request->validated();
        $reserve = Reserve::create([
            'patient_id' => Auth::user()->id,
            'doctor_id' => $doctor->id,
            'hour' => $validated['hour']
        ]);

        return new ReserveResource($reserve);
    }

    public function delete_reserve(Reserve $reserve)
    {
        $reserve->delete();
        return response()->json([
            'message' => 'reserve deleted successfylly'
        ]);
    }
}
