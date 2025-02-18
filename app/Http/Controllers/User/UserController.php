<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;

class UserController extends Controller
{
    public function signin_user(CreateUserRequest $request)
    {
        $validated = $request->validated();
        $validated['password'] = Hash::make($validated['password']);
        $is_national_id_validate = $this->check_national_id($validated['national_id']);
        if ($is_national_id_validate) {
            $user = User::create($validated);
            return new UserResource($user);
        } else {
            abort('403', 'invalid national id');
        }
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'national_id' => 'required',
            'password' => ['required', 'regex:/^[a-zA-Z0-9]*$/']
        ]);


        if (Auth::attempt($validated)) {
            $user = Auth::user();
            if ($user->is_doctor == false) {
                $user_information = $user->patient;
                $token = $user->createToken('api_token')->plainTextToken;
                return response()->json(['token' => $token, 'token_type' => "Bearer", 'user' => $user_information], 200);
            } else {
                $user_information = $user->doctor;
                $token = $user->createToken('api_token')->plainTextToken;
                return response()->json(['token' => $token, 'token_type' => "Bearer", 'user' => $user_information], 200);
            }
        } else {
            return response()->json([
                'message' => "login information invalid"
            ], 401);
        }
    }

    public function logout()
    {
        Auth::logout();
        return response()->json([
            'message' => 'logout successfully'
        ]);
    }



    function check_national_id($value)
    {
        if (!preg_match('/^[0-9]{10}$/', $value)) {
            return (bool) false;
        }

        for ($i = 0; $i < 10; $i++)
            if (preg_match('/^' . $i . '{10}$/', $value)) {
                return (bool) false;
            }

        for ($i = 0, $sum = 0; $i < 9; $i++)
            $sum += ((10 - $i) * intval(substr($value, $i, 1)));
        $ret = $sum % 11;
        $parity = intval(substr($value, 9, 1));
        if (($ret < 2 && $ret == $parity) || ($ret >= 2 && $ret == 11 - $parity)) {
            return (bool) true;
        }

        return (bool) false;
    }

    public function update_user(User $user, UpdateUserRequest $request)
    {
        if (Auth::user()->id == $user->id) {
            $validated = $request->validated();
            $user->update($validated);
            return new UserResource($user);
        } else {
            abort(403, "You don't have access to update the other user profile!");
        }
    }
}
