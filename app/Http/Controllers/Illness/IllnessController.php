<?php

namespace App\Http\Controllers\Illness;

use App\Models\Illness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\Illness\IllnessResource;
use App\Http\Requests\Illness\CreateIllnessRequest;
use App\Http\Requests\Illness\UpdateIllnessRequest;

class IllnessController extends Controller
{
    public function create_illness(CreateIllnessRequest $request)
    {
        $validated = $request->validated();
        $illness = Illness::create([
            'name' => $validated['name'],
            'content' => $validated['content'],
            'time' => $validated['time'],
            'patient_id' => Auth::user()->id
        ]);

        return new IllnessResource($illness);
    }

    public function delete_illness(Illness $illness)
    {


        if ($illness->patient_id == Auth::user()->patient->id) {
            $illness->delete();
            return response()->json([
                'message' => 'illness deleted successfully!'
            ]);
        } else {
            abort(403, "You cannot delete other person's illness!");
        }
    }

    public function update_illness(UpdateIllnessRequest $request, Illness $illness)
    {
        $validated = $request->validated();
        if ($illness->patient_id == Auth::user()->patient->id) {
            $illness->update($validated);
            return response()->json([
                'message' => 'illness updated successfullly!'
            ]);
        } else {
            abort(403, "You cannot update other person's illness!");
        }
    }
}
