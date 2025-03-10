<?php

use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Sign In User
Route::post('/sign-in-user' , [UserController::class , 'sign_in_user']);
// User Log In
Route::post('/log-in-user' , [UserController::class , 'login_user']);
// Sign In Patient
Route::post('/register-patient' , [PatientController::class , 'register_patient'])->middleware('auth:sanctum');

















// Log Out User
Route::post('/log-out-user' , [UserController::class , 'log_out_user'])->middleware('auth:sanctum');


