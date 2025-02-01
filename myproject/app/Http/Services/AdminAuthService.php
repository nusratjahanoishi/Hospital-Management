<?php
namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminAuthService
{
    public function register($data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' =>'admin',
        ]);
    }

    public function login($credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = User::where('role', 'admin')->select('id', 'name', 'email','role', 'created_at')->get();;
            return $user;
        }
        return ['error' => 'Invalid credentials'];
    }
    public function logoutProcess ()
    {
        Auth::logout();
        return ['message' => 'Logged Out Successfully'];
    }
  
}
