<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthService
{
    /**
     * Register a new admin user.
     */
    public function register($data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'admin',
        ]);
    }

    /**
     * Attempt to login.
     */
    public function login($credentials)
    {
        if (Auth::attempt($credentials)) {
            $user = User::where('role', 'admin')
                ->select('id', 'name', 'email', 'role', 'created_at')
                ->first();
            return $user;
        }
        return ['error' => 'Invalid credentials'];
    }

    /**
     * Process logout.
     */
    public function logoutProcess()
    {
        Auth::logout();
        return ['message' => 'Logged Out Successfully'];
    }
}
