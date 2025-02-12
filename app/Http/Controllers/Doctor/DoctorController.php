<?php

namespace App\Http\Controllers\Doctor;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\CreateDoctorRequest;

class DoctorController extends Controller
{
    public function signin_doctor(User $user, CreateDoctorRequest $request) {}
}