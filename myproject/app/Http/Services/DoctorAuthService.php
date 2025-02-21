<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorAuthService
{
    /**
     * Register a new doctor.
     */
    public function register($data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'doctor',
        ]);
    }

    /**
     * Attempt to log in a doctor.
     */
    public function login($credentials)
    {
        if (Auth::attempt($credentials)) {
            // Only return the doctor user.
            $user = User::where('role', 'doctor')
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
