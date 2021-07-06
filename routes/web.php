<?php

use App\Http\Controllers\DoctorProfileController;
use App\Http\Controllers\user\UserAppointmentController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::view('/', 'home');

Auth::routes();

Route::middleware(['auth', 'auth.admin'])->prefix('admin')->group(function () {
    Route::view('/test', 'home')->name('test');
});
Route::middleware(['auth', 'auth.doctor'])->group(function () {
    Route::get('/doctor/profile', [DoctorProfileController::class, 'index'])->name('doctor.profile');
    Route::post('/doctor/profile/submit', [DoctorProfileController::class, 'submit'])->name('doctor.submitprofile');
});
Route::middleware(['auth'])->group(function () {
    Route::view('/patient/create-appointment', 'Patient.choose_specialization')->name('patient.appointment.spec');
    Route::get('/patient/create-appointment/create/{specialization}', [UserAppointmentController::class, 'index'])->name('patient.appointment');
    Route::post('/patient/create-appointment/submit', [UserAppointmentController::class, 'submit'])->name('appointment.submit');
});

