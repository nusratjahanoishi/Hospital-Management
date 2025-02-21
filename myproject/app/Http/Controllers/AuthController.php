<?php

namespace App\Http\Controllers;

use App\Http\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    /**
     * Show the patient login form.
     * If a patient is already logged in, redirect to the dashboard.
     */
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // If the logged-in user is a patient, redirect to dashboard.
            if ($user->role === 'patient') {
                return redirect()->route('dashboard');
            } else {
                // If someone with another role is logged in, log them out.
                Auth::logout();
            }
        }
        return view('layout.auth.login');
    }

    /**
     * Display the patient dashboard.
     */
    public function dashboard()
    {
        return view('layout.patient');
    }

    /**
     * Handle patient registration.
     */
    public function register(Request $request)
    {
        $user = $this->authService->register($request->all());
        return redirect()->route('login');
    }

    /**
     * Handle patient login.
     */
    public function login(Request $request)
    {
        // If already logged in, redirect to the dashboard.
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
    
        $response = $this->authService->login($request->only('email', 'password'));
    
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Invalid Email Or Password');
        }
    
        $user = Auth::user();
    
        if ($user->role === 'patient') {
            return redirect()->route('dashboard');
        } else {
            Auth::logout(); 
            return redirect()->back()->with('error', 'Only patients are allowed to log in.');
        }
    }

    /**
     * Handle logout.
     */
    public function logout(): RedirectResponse
    {
        $response = $this->authService->logoutProcess();
        return redirect()->route('login')->with($response);
    }
}
