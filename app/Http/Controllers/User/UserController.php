<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Resources\User\UserResource;
use App\Http\Resources\User\UserCollection;
use App\Http\Requests\User\LoginUserRequest;
use App\Http\Requests\User\CreateUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Requests\User\UpdatePasswordRequest;

class UserController extends Controller
{

    public function get_all_users(){
        $users = User::all();
        return new UserCollection($users);
    }

    public function update_password(User  $user , UpdatePasswordRequest $updatePasswordRequest ){
        $validated = $updatePasswordRequest->validated();
        if(Hash::check($validated['password'], $user->password)){
            $user->password = Hash::make($validated['new_password']);
            $user->save();
            return new UserResource($user);
        }else{
            abort(403 , 'Old password in incorrect!');
        }

    }
    public function update_user_information(User $user , UpdateUserRequest $updateUserRequest){
        $validated = $updateUserRequest->validated();
        $user->update($validated);
        return new UserResource($user);
    }

    public function log_out_user(){
        // Get the currently authenticated user
        $user = Auth::user();
        if ($user) {
            $user->tokens()->delete();
        }

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function login_user (LoginUserRequest $loginUserRequest){
        $validated = $loginUserRequest->validated();
        if(auth()->attempt($validated)){
            return response()->json([
                'token' =>  Auth::user()->createToken('bareer')->plainTextToken
            ]);
            
        }else{
            abort(403 , "Invalid Data");
        }
        
    }
    public function sign_in_user(CreateUserRequest $createUserRequest){
        $validated = $createUserRequest->validated();
        $validated['is_doctor'] = "false";
        if($this->check_national_id($validated['national_id'])){
            $user = User::create($validated);
            return new UserResource($user);
        }else{
            abort('403' , 'invalid national_id');
        }
        
    }

    // To check national_id is valid or not
    function check_national_id($value){
        if(!preg_match('/^[0-9]{10}$/',$value)) {
            return (bool) false;
        }
    
        for($i=0;$i<10;$i++)
            if(preg_match('/^'.$i.'{10}$/',$value)) {
                return (bool) false;
            }
    
        for($i=0,$sum=0;$i<9;$i++)
            $sum+=((10-$i)*intval(substr($value, $i,1)));
            $ret=$sum%11;
            $parity=intval(substr($value, 9,1));
            if(($ret<2 && $ret==$parity) || ($ret>=2 && $ret==11-$parity)) {
                return (bool) true;
            }
    
        return (bool) false;

    }
}
