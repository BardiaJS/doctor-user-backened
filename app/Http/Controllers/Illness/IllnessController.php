<?php

namespace App\Http\Controllers\Illness;

use App\Http\Resources\Illness\IllnessResource;
use App\Models\Illness;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Illness\CreateIllnessRequest;

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
        $illness->delete();
        return response()->json([
            'message' => 'illness deleted successfully!'
        ]);
    }
}
