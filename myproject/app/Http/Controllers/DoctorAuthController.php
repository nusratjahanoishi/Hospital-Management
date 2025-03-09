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

    /**
     * Show the login form.
     * If a doctor is already logged in, redirect to the dashboard.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // If the logged-in user is a doctor, redirect to dashboard.
            if ($user->role === 'doctor') {
                return redirect()->route('doctor.dashboard');
            } else {
                // If a different role is logged in, log them out.
                Auth::logout();
            }
        }
        return view('layout.auth.doctor.login');
    }

    /**
     * Display the doctor dashboard.
     */
    public function dashboard()
    {
        return view('layout.doctor');
    }

    /**
     * Handle doctor registration.
     */
    public function register(Request $request)
    {
        $user = $this->doctorAuthService->register($request->all());
        return redirect()->route('doctor.login');
    }

    /**
     * Handle doctor login.
     */
    public function login(Request $request)
    {
        // Check if someone is already logged in.
        if (Auth::check()) {
            return redirect()->route('doctor.dashboard');
        }

        $response = $this->doctorAuthService->login($request->only('email', 'password'));

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        $user = Auth::user();
        if ($user->role === 'doctor') {
            return redirect()->route('doctor.dashboard');
        } else {
            Auth::logout();
            return redirect()->back()->with('error', 'Only doctors are allowed to log in.');
        }
    }

    /**
     * Handle logout.
     */
    public function logout(): RedirectResponse
    {
        $response = $this->doctorAuthService->logoutProcess();
        return redirect()->route('doctor.login')->with($response);
    }
}
