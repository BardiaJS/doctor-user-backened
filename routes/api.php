<?php

use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

// Sign In User
Route::post('/sign-in-user' , [UserController::class , 'sign_in_user']);
// User Log In
Route::post('/log-in-user' , [UserController::class , 'login_user'])->name('login');
















// Sign In Patient
Route::post('/register-patient' , [PatientController::class , 'register_patient'])->middleware('auth:sanctum');

// Change User Information
Route::patch('/update-user/{user}' , [UserController::class , 'update_user_information'])->middleware('auth:sanctum');

// Change Password For User
Route::patch('/update-password/{user}' , [UserController::class , 'update_password'])->middleware('auth:sanctum');

// Change Patient Information
Route::patch('/update-patient/{patient}' , [PatientController::class , 'update_patient_information'])->middleware('auth:sanctum');

// Get All Doctors List
Route::get('/doctors-list' , [DoctorController::class , 'get_all_doctors']);

// Get All Users
Route::get('/get-all-users' , [DoctorController::class , 'get_all_users']);


// Log Out User
Route::post('/log-out-user' , [UserController::class , 'log_out_user'])->middleware('auth:sanctum');


