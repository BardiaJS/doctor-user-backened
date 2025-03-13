<?php

namespace App\Http\Controllers\Patient;

use Illuminate\Http\Request;
use App\Models\Patient\Patient;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Patient\PatientResource;
use App\Http\Requests\Patient\CreatePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;

class PatientController extends Controller
{

    public function update_patient_information(Patient $patient , UpdatePatientRequest $updatePatientRequest){
        $validated = $updatePatientRequest->validated();
        $patient->update($validated);
        return new PatientResource($patient);
    }
    public function register_patient(CreatePatientRequest $createPatientRequest){
        $userId = Auth::user()->id;
        $isUserIdUnique = !Patient::where('user_id', $userId)->exists();
        $validated = $createPatientRequest->validated();
        if($isUserIdUnique){
            $patient = Patient::create(
                [
                    'user_id' => $userId,
                    'insurance_number' => $validated['insurance_number'] ,
                    'type_of_insurance' => $validated['type_of_insurance'] ,
                    'medical_history' => $validated['medical_history']
                ]
            );
            return new PatientResource($patient);
        }else {
            // Handle the case where the user_id is not unique
            return response()->json(['error' => 'This user already has a patient record.'], 409);
        }

    }
}
