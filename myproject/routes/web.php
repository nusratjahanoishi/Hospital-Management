<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\PatientProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorAuthController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\DoctorExpertController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\TestController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('layout.auth.register');
});

// Registration routes
Route::get('/register', function () {
    return view('layout.auth.register');
});
Route::post('/register', [AuthController::class, 'register'])->name('register');

// Login routes (using the controller method to show the login form)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');

// Dashboard and logout routes
Route::get('/patient/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');


Route::get('/patient/doctor/index', [PatientController::class, 'index'])->name('patient.doctor.index');
Route::get('/patient/appointment/list{id}', [PatientController::class, 'list'])->name('patient.appointment.list');
Route::get('/patient/doctor/profile{id}', [PatientController::class, 'doctor_profile'])->name('patient.doctor.profile');
Route::get('/patient/doctor/appointment{id}', [PatientController::class, 'appointment'])->name('patient.doctor.appointment');
Route::post('/patient/appointment/store', [PatientController::class, 'store'])->name('patient.appointment.store');

//patient profile 
Route::get('/patient/index', [PatientProfileController::class, 'index'])->name('patient.index');
Route::get('/patient/create', [PatientProfileController::class, 'create'])->name('patient.create');
Route::post('/patient/store', [PatientProfileController::class, 'store'])->name('patient.store');
Route::get('/patient/edit/{id}', [PatientProfileController::class, 'edit'])->name('patient.edit');
Route::get('/patient/delete/{id}', [PatientProfileController::class, 'delete'])->name('patient.delete');




//Doctor
Route::get('/doctor/register', function() {
    return view('layout.auth.doctor.register');
})->name('doctor.register.form');

Route::get('/doctor/login', [DoctorAuthController::class, 'showLoginForm'])->name('doctor.login');

// Post routes for registration and login
Route::post('/doctor/register', [DoctorAuthController::class, 'register'])->name('doctor.register');
Route::post('/doctor/login', [DoctorAuthController::class, 'login'])->name('doctor.login.post');

// Dashboard and logout routes
Route::get('/doctor/dashboard', [DoctorAuthController::class, 'dashboard'])->name('doctor.dashboard');
Route::get('/doctor/logout', [DoctorAuthController::class, 'logout'])->name('doctor.logout');

Route::get('/doctor/index', [DoctorController::class, 'index'])->name('doctor.index');
Route::get('/doctor/create', [DoctorController::class, 'create'])->name('doctor.create');
Route::post('/doctor/store', [DoctorController::class, 'store'])->name('doctor.store');
Route::get('/doctor/edit/{id}', [DoctorController::class, 'edit'])->name('doctor.edit');
Route::get('/doctor/delete/{id}', [DoctorController::class, 'delete'])->name('doctor.delete');




//Admin
Route::get('/admin/register', function() {
    return view('layout.auth.admin.register');
});
Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])->name('admin.login');

Route::post('/admin/register', [AdminAuthController::class, 'register'])->name('admin.register');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login.post');

Route::get('/admin/dashboard', [AdminAuthController::class, 'dashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');

Route::get('/admin/position/index', [DoctorExpertController::class, 'index'])->name('doctor.position.index');
Route::get('/admin/position/create', [DoctorExpertController::class, 'create'])->name('doctor.position.create');
Route::post('/admin/position/store', [DoctorExpertController::class, 'store'])->name('doctor.position.store');
Route::get('/admin/position/edit/{id}', [DoctorExpertController::class, 'edit'])->name('doctor.position.edit');
Route::get('/admin/position/delete/{id}', [DoctorExpertController::class, 'delete'])->name('doctor.position.delete');




//Appointment
Route::get('/appointments', [AppointmentController::class, 'index'])->name('appointments.index');
Route::get('/appointments/create', [AppointmentController::class, 'create'])->name('appointments.create');
Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::post('/appointments/status', [AppointmentController::class, 'status'])->name('appointments.status');
Route::get('/appointments/{appointment}', [AppointmentController::class, 'show'])->name('appointments.show');
Route::put('/appointments/{appointment}', [AppointmentController::class, 'update'])->name('appointments.update');
Route::get('/appointments/delete/{appointment}', [AppointmentController::class, 'destroy'])->name('appointments.delete'); 

//test
Route::get('/admin/test/index', [TestController::class, 'index'])->name('admin.test.index');
Route::get('/admin/test/create', [TestController::class, 'create'])->name('admin.test.create');
Route::post('/admin/test/store', [TestController::class, 'store'])->name('admin.test.store');
Route::get('/admin/test/edit/{id}', [TestController::class, 'edit'])->name('admin.test.edit');
Route::get('/admin/test/delete/{id}', [TestController::class, 'delete'])->name('admin.test.delete');
//report
Route::get('/admin/report/index', [ReportController::class, 'index'])->name('admin.report.index');
Route::get('/admin/report/create', [ReportController::class, 'create'])->name('admin.report.create');
Route::post('/admin/report/store', [ReportController::class, 'store'])->name('admin.report.store');
Route::get('/admin/report/edit/{id}', [ReportController::class, 'edit'])->name('admin.report.edit');
Route::get('/admin/report/delete/{id}', [ReportController::class, 'delete'])->name('admin.report.delete');
Route::get('/admin/report/invoice/{id}', [ReportController::class, 'invoice'])->name('admin.report.invoice');
Route::post('/admin/report/status', [ReportController::class, 'status'])->name('admin.report.status');