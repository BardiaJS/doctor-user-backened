<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\User\UserResource;
use App\Http\Requests\User\CreateUserRequest;

class UserController extends Controller
{
    public function sign_in_user(CreateUserRequest $createUserRequest){
        $validated = $createUserRequest->validated();
        $validated['is_doctor'] = "false";
        if($this->check_national_id($validated['national_id'])){
            $user = User::create($validated);
            Auth::login($user);
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
