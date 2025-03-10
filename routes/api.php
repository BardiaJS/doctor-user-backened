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

// Sign In Patient
Route::post('/sign-in-patient' , [PatientController::class , 'sign_in_patient']);
