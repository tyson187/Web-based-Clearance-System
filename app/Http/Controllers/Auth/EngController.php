<?php

namespace App\Http\Controllers\Auth;

// This line is required so PHP knows where the base "Controller" is
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class EngController extends Controller
{
    public function index() 
    {
        // Ensure this blade file exists at: resources/views/department/deanENG.blade.php
        return view('department.deanENG');
    }
//     public function showLoginForm()
//     {
//         return view('department.login');
//     }

//     public function login(Request $request)
//     {
//         // 1. Validate Input
//         $credentials = $request->validate([
//             'email' => 'required|email',
//             'password' => 'required',
//         ]);

//         $staticAccounts = config('departments.accounts');

//         // 2. Check if email exists in our static list
//         if (array_key_exists($credentials['email'], $staticAccounts)) {
//             $user = $staticAccounts[$credentials['email']];

//             // 3. Check if password matches
//             if ($user['password'] === $credentials['password']) {
                
//                 // Manual Session Login
//                 Session::put('dept_logged_in', true);
//                 Session::put('dept_email', $credentials['email']);
//                 Session::put('dept_name', $user['name']);

//                 return redirect()->route('dept.dashboard');
//             }
//         }

//         // 4. Failed Login
//         return back()->withErrors([
//             'email' => 'The provided credentials do not match our records.',
//         ])->onlyInput('email');
//     }

//     public function logout()
//     {
//         Session::forget(['dept_logged_in', 'dept_email', 'dept_name']);
//         return redirect()->route('dept.login');
//     }
 }