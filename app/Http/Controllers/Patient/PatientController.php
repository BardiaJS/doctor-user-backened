<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Models\Patient\Patient;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Patient\CreatePatientRequest;
use App\Http\Resources\Patient\PatientResource;

class PatientController extends Controller
{
    public function sign_in_patient(CreatePatientRequest $createPatientRequest){
        return response()->json([
            'id' => Auth::user()->id
        ]);
        // $validated = $createPatientRequest->validated();
        // $validated['id'] = Auth::user()->id;
        // $patient = Patient::create($validated);
        // return new PatientResource($patient);
    }
}
