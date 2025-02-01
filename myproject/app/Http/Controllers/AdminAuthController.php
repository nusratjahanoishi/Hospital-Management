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

    public function register(Request $request)
    {
        $user = $this->adminAuthService->register($request->all());
       return  redirect()->route('admin.login');
    }

    public function login(Request $request)
    {
        $response = $this->adminAuthService->login($request->only('email', 'password'));
        if (!Auth::check()) {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
        $user = Auth::user();
        if ($user->role === 'admin') {
            return view('layout.admin', compact('response'));
        } else {
            Auth::logout(); 
            return redirect()->back()->with('error', 'Only admin are allowed to log in.');
        }
           
       
    }
    public function logout (): RedirectResponse
    {
        $response = $this->adminAuthService->logoutProcess();
        return redirect()->route('admin.login')->with($response);
    }

}
