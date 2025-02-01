<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\AuthService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function register(Request $request)
    {
        $user = $this->authService->register($request->all());
       return  redirect()->route('login');
    }

    public function login(Request $request)
    {
    $response = $this->authService->login($request->only('email', 'password'));
    if (!Auth::check()) {
        return redirect()->back()->with('error', 'Invalid credentials');
    }
    $user = Auth::user();
    if ($user->role === 'patient') {
        return view('layout.patient', compact('response'));
    } else {
        Auth::logout(); 
        return redirect()->back()->with('error', 'Only patients are allowed to log in.');
    }
       
    }
    public function logout (): RedirectResponse
    {
        $response = $this->authService->logoutProcess();
        return redirect()->route('login')->with($response);
    }
}
