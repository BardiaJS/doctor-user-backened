<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Patient\PatientResource;
use App\Http\Requests\Patient\CreatePatientRequest;
use App\Http\Requests\Patient\UpdatePatientRequest;

class PatientController extends Controller
{
    public function signin_patient(User $user, CreatePatientRequest $request)
    {
        $validated = $request->validated();
        Patient::create([
            'user_id' => $user->id,
            'type_of_insurance' => $validated['type_of_insurance'],
            'insurance_number' => $validated['insurance_number']
        ]);
    }
    public function update_patient(Patient $patient, UpdatePatientRequest $request)
    {
        if (Auth::user()->id == $patient->user_id) {
            $validated = $request->validated();
            $patient->update($validated);
            return new PatientResource($patient);
        } else {
            abort(403, "You cannot update other patient's profile!");
        }
    }
}
