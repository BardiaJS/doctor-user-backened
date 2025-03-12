<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Resources\User\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Doctor\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Resources\Doctor\DoctorCollection;

class DoctorController extends Controller
{

    public function get_all_users(){
        $users = User::all();
        return new UserCollection($users);
    }
    public function get_all_doctors(){

        $doctors = Doctor::all();
        if($doctors->isEmpty()== false){
            
            return new DoctorCollection($doctors);
        }else{
            return response()->json([
                "message" => "no doctor"
            ]);
        }
    }


}
