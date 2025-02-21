<?php

namespace App\Http\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    /**
     * Register a new patient.
     */
    public function register($data)
    {
        return User::create([
            'name'     => $data['name'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
            'role'     => 'patient',
        ]);
    }

    /**
     * Attempt to login a patient.
     */
    public function login($credentials)
    {
        if (Auth::attempt($credentials)) {
            // Only return the patient user.
            $user = User::where('role', 'patient')
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
