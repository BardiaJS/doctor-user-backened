<?php

use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('/signin-user', [UserController::class, 'signin_user']);
Route::post('/signin-patient/{user}', [PatientController::class, 'signin_patient']);
Route::post('/signin-doctor/{user}', [DoctorController::class, 'signin_doctor']);

Route::post('/login', [UserController::class, 'login_user']);
Route::post('/logout-user', [UserController::class, 'logout_user']);