<?php

namespace App\Http\Controllers\Medicine;

use App\Models\User;
use App\Models\Medicine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Medicine\CreateMedicineRequest;
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
        $medicine->delete();
        return response([
            'message' => 'medicine deleted successfully!'
        ]);
    }
}
