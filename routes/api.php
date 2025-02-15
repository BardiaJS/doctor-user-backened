<?php

use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Illness\IllnessController;
use App\Http\Controllers\Medicine\MedicineController;
use App\Http\Controllers\Patient\PatientController;
use App\Http\Controllers\Reserve\ReserveController;
use App\Http\Controllers\User\UserController;
use App\Models\Reserve;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// USER RELATED
// sign in
Route::post('/signin-user', [UserController::class, 'signin_user']);
Route::post('/signin-patient/{user}', [PatientController::class, 'signin_patient']);
//user update
Route::put('/update-user/{user}', [UserController::class, 'update_user'])->middleware('auth:sanctum');
//patient update
Route::put('/update-patient/{patient}', [PatientController::class, 'update_patient'])->middleware('auth:sanctum');
// log in
Route::post('/login', [UserController::class, 'login_user']);
// log out
Route::post('/logout-user', [UserController::class, 'logout_user'])->middleware('auth:sanctum');
// MEDICINE RELATED
// medicine creation
Route::post('/create-medicine', [MedicineController::class, 'create_medicine'])->middleware('auth:sanctum');
// medicine update
Route::put('/update-medicine/{medicine}', [MedicineController::class, 'update_medicine'])->middleware('auth:sanctum');
// medicie delete
Route::delete('/delete-medicine/{medicine}', [MedicineController::class, 'delete_medicine'])->middleware('auth:sanctum');
// ILLNESS RELATED
// illness creation
Route::post('/create-illness', [IllnessController::class, 'create_illness'])->middleware('auth:sanctum');
// update illness
Route::put('/update-illness/{illness}', [IllnessController::class, 'update_illness'])->middleware('auth:sanctum');
// delete illness
Route::delete('/delete-illness/{illness}', [IllnessController::class, 'delete_illness'])->middleware('auth:sanctum');
// RESERVE RELATED
// create reserve
Route::post('/create-reserve/doctor/{doctor}', [ReserveController::class, 'create_reserve'])->middleware('auth:sanctum');
//delete reserve
Route::delete('/delete-reserve/{reserve}', [ReserveController::class, 'delete_reserve'])->middleware('auth:sanctum');
// update reserve
// reserve doesn't need update endpoint