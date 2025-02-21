<?php

namespace App\Http\Controllers;

use App\Http\Services\AdminAuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthController extends Controller
{
  
    protected $adminAuthService;

    public function __construct(AdminAuthService $adminAuthService)
    {
        $this->adminAuthService = $adminAuthService;
    }
    public function dashboard()
    {
        return view('layout.admin');
    }
    public function showLoginForm()
    {
        if (Auth::check()) {
            $user = Auth::user();
            // If already logged in as admin, send them to the dashboard.
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } else {
                // If a non-admin is logged in, log them out and show the login form.
                Auth::logout();
            }
        }
        return view('layout.auth.admin.login');
    }
    public function register(Request $request)
    {
        $user = $this->adminAuthService->register($request->all());
       return  redirect()->route('admin.login');
    }

    public function login(Request $request)
    {
        // If already logged in, redirect to dashboard.
        if (Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        $response = $this->adminAuthService->login($request->only('email', 'password'));

        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }

        $user = Auth::user();
        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            Auth::logout();
            return redirect()->back()->with('error', 'Only admins are allowed to log in.');
        }
    }

    public function logout (): RedirectResponse
    {
        $response = $this->adminAuthService->logoutProcess();
        return redirect()->route('admin.login')->with($response);
    }

}
