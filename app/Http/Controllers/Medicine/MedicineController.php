<?php

namespace App\Http\Controllers\Medicine;

use App\Models\User;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Medicine\CreateMedicineRequest;
use App\Http\Requests\Medicine\UpdateMedicineRequest;
use App\Http\Resources\Medicine\MedicineResource;

class MedicineController extends Controller
{
    public function create_medicine(User $user, CreateMedicineRequest $request)
    {
        $validated = $request->validated();
        $medicine = Medicine::create([
            'name' => $validated['name'],
            'time' => $validated['time'],
            'patient_id' => Auth::user()->id
        ]);

        return new MedicineResource($medicine);
    }

    public function delete_medicine(Medicine $medicine)
    {

        if ($medicine->patient_id == Auth::user()->patient->id) {
            $medicine->delete();
            return response([
                'message' => 'medicine deleted successfully!'
            ]);
        } else {
            abort(403, "You cannot delete other person's medicine!");
        }
    }


    public function update_medicine(Medicine $medicine, UpdateMedicineRequest $request)
    {
        if ($medicine->patient_id == Auth::user()->patient->id) {
            $validated = $request->validated();
            $medicine->update($validated);
            return new MedicineResource($medicine);
        } else {
            abort(403, "You cannot update other person's medicine information!");
        }
    }
}
