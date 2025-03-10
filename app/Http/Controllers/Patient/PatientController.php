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
    public function register_patient(CreatePatientRequest $createPatientRequest){
        $validated = $createPatientRequest->validated();
        $patient = Patient::create(
            [
                'user_id' => Auth::user()->id ,
                'insurance_number' => $validated['insurance_number'] ,
                'type_of_insurance' => $validated['type_of_insurance'] ,
                'medical_history' => $validated['medical_history']
            ]
        );
        return new PatientResource($patient);
    }
}
