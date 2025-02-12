<?php

namespace App\Http\Controllers\Patient;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Patient\CreatePatientRequest;

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
}