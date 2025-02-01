<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DoctorAuthController;

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



Route::view('/register', 'layout.auth.register');
Route::view('/login', 'layout.auth.login');


Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');



Route::view('/doctor/register', 'layout.auth.doctor.register');
Route::view('/doctor/login', 'layout.auth.doctor.login');


Route::post('/doctor/register', [DoctorAuthController::class, 'register'])->name('doctor.register');
Route::post('/doctor/login', [DoctorAuthController::class, 'login'])->name('doctor.login');
Route::get('/doctor/logout', [DoctorAuthController::class, 'logout'])->name('doctor.logout');

Route::view('/admin/register', 'layout.auth.admin.register');
Route::view('/admin/login', 'layout.auth.admin.login');


Route::post('/admin/register', [AdminAuthController::class,'register'])->name('admin.register');
Route::post('/admin/login', [AdminAuthController::class, 'login'])->name('admin.login');
Route::get('/admin/logout', [AdminAuthController::class, 'logout'])->name('admin.logout');



