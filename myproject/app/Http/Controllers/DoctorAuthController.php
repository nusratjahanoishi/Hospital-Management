<?php

namespace App\Http\Controllers;

use App\Http\Services\DoctorAuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DoctorAuthController extends Controller
{
    protected $doctorAuthService;

    public function __construct(DoctorAuthService $doctorAuthService)
    {
        $this->doctorAuthService = $doctorAuthService;
    }

    public function register(Request $request)
    {
        $user = $this->doctorAuthService->register($request->all());
       return  redirect()->route('doctor.login');
    }

    public function login(Request $request)
    {
        $response = $this->doctorAuthService->login($request->only('email', 'password'));
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
        $user = Auth::user();
        if ($user->role === 'doctor') {
            return view('layout.doctor', compact('response'));
        } else {
            Auth::logout(); 
            return redirect()->back()->with('error', 'Only doctor are allowed to log in.');
        }
    }
    public function logout (): RedirectResponse
    {
        $response = $this->doctorAuthService->logoutProcess();
        return redirect()->route('doctor.login')->with($response);
    }
}
