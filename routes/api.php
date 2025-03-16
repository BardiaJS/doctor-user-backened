<?php

use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Hour\HourController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Reserve\ReserveController;
use App\Http\Controllers\Time\TimeController;
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

// Set Time For Doctor
Route::post('/set-time/doctor/{doctor}' , [TimeController::class , 'set_time'])->middleware('auth:sanctum');

// Set Hour for Doctor For The Time
Route::post("/set-hour/time/{time}" , [HourController::class , 'set_hour'])->middleware('auth:sanctum');

// Create Reservation For The User
Route::post("/set-reserve/user/{user}/time/{time}/doctor/{doctor}" , [ReserveController::class , 'set_reserve'])->middleware('auth:sanctum');

// Update The Time Doctor
Route::patch('/update-time/{time}' , [TimeController::class , 'update_time'])->middleware('auth:sanctum');

// Update The Hour Doctor
Route::patch('/update-hour/{hour}' , [HourController::class , 'update_hour'])->middleware('auth:sanctum');

// Delete The Time
Route::delete('/delete-time/{time}' , [TimeController::class , 'delete_time'])->middleware('auth:sanctum');

// Delete The Hour
Route::delete('/delete-time/{hour}' , [HourController::class , 'delete_hour'])->middleware('auth:sanctum');

// Log Out User
Route::post('/log-out-user' , [UserController::class , 'log_out_user'])->middleware('auth:sanctum');


