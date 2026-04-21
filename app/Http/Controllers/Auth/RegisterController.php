<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'user_type' => 'required|in:student,faculty',
            'password' => 'required|string|min:8|confirmed',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        try {
            $user = User::create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'user_type' => $request->input('user_type'),
                'password' => Hash::make($request->input('password')),
            ]);

            return redirect()->route('login')
                ->with('success', 'Account created successfully! Please login with your credentials.');
        } catch (\Exception $e) {
            return back()->withErrors(['error' => 'Failed to create account. Please try again.'])->withInput();
        }
    }
}
