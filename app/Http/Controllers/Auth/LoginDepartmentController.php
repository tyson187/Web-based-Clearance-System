<?php

namespace App\Http\Controllers\Auth;

// This line is required so PHP knows where the base "Controller" is
use App\Http\Controllers\Controller; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LoginDepartmentController extends Controller
{

// public function login(Request $request)
// {
//     $credentials = $request->validate([
//         'email' => 'required|email',
//         'password' => 'required',
//     ]);

//     $accounts = config('departments.accounts');

//     // 1. Check if email exists and password matches
//     if (isset($accounts[$credentials['email']]) && $accounts[$credentials['email']]['password'] === $credentials['password']) {
        
//         // 2. Save session data
//         session([
//             'dept_logged_in' => true,
//             'dept_email' => $credentials['email'],
//             'dept_name' => $accounts[$credentials['email']]['name']
//         ]);

//         // 3. Redirect based on email
//         switch ($credentials['email']) {
//             case 'cs@benedicto.edu':
//                 return redirect()->route('dept.cs.dashboard');

//             case 'educ@benedicto.edu':
//                 return redirect()->route('dept.educ.dashboard');

//             case 'cbm@benedicto.edu':
//                 return redirect()->route('dept.cbm.dashboard');
            
//             case 'eng@benedicto.edu':
//                 return redirect()->route('dept.eng.dashboard');

//             case 'library@benedicto.edu':
//                 return redirect()->route('dept.library.dashboard');

//             default:
//                 // Fallback for Business or Education if you haven't made special pages yet
//                 return redirect()->route('dept.general.dashboard');
//         }
//     }

//     return back()->withErrors(['email' => 'Invalid credentials.']);
// }


//     // public function index() 
//     // {
//     //     // Ensure this blade file exists at: resources/views/department/deanCSS.blade.php
//     //     return view('department.deanCSS');
//     // }
//     // public function showLoginForm()
//     // {
//     //     return view('department.login');
//     // }

//     // public function login(Request $request)
//     // {
//     //     // 1. Validate Input
//     //     $credentials = $request->validate([
//     //         'email' => 'required|email',
//     //         'password' => 'required',
//     //     ]);

//     //     $staticAccounts = config('departments.accounts');

//     //     // 2. Check if email exists in our static list
//     //     if (array_key_exists($credentials['email'], $staticAccounts)) {
//     //         $user = $staticAccounts[$credentials['email']];

//     //         // 3. Check if password matches
//     //         if ($user['password'] === $credentials['password']) {
                
//     //             // Manual Session Login
//     //             Session::put('dept_logged_in', true);
//     //             Session::put('dept_email', $credentials['email']);
//     //             Session::put('dept_name', $user['name']);

//     //             return redirect()->route('dept.dashboard');
//     //         }
//     //     }

//         // 4. Failed Login
//         // return back()->withErrors([
//         //     'email' => 'The provided credentials do not match our records.',
//         // ])->onlyInput('email');
    

//     // public function logout()
//     // {
//     //     Session::forget(['dept_logged_in', 'dept_email', 'dept_name']);
//     //     return redirect()->route('dept.login');
//     // }

//     // Inside LoginDepartmentController

// public function showCS() {
//     return view('department.deanCSS'); // Your CS Blade
// }

// public function showEng() {
//     return view('department.deanENG'); // Your Engineering Blade
// }

// public function showLibrary() {
//     return view('department.library'); // Your Library Blade
// }

// public function showEDUC() {
//     return view('department.deanEDUC'); // Your EDUC Blade
// }

// public function showCBM() {
//     return view('department.deanCBM'); // Your CBM Blade
// }

}