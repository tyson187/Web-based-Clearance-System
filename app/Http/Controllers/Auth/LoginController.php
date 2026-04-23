<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'role' => 'required|in:user,admin,department',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $role = $request->input('role');
        $email = $request->input('email');
        $password = $request->input('password');

        if ($role === 'user') {
            return $this->loginUser($request, $email, $password);
        } elseif ($role === 'admin') {
            return $this->loginAdmin($request, $email, $password);
        } elseif ($role === 'department') {
            return $this->loginDepartment($request, $email, $password);
        }

        return back()->with('error', 'Invalid role');
    }

    protected function loginUser(Request $request, $email, $password)
    {
        $user = User::where('email', $email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            return back()->withInput($request->only('email'))->with('error', 'Invalid email or password');
        }

        // Login the user using Laravel's auth
        Auth::login($user);
        $request->session()->put('user_role', 'user');
        $request->session()->put('user_type', $user->user_type);

        return redirect()->intended('/dashboard'); // Update this route as needed
    }

    protected function loginAdmin(Request $request, $email, $password)
    {
        $admin = Admin::where('admin_email', $email)->first();

        if (!$admin || !Hash::check($password, $admin->admin_password)) {
            return back()->withInput($request->only('email'))->with('error', 'Invalid admin email or password');
        }

        $request->session()->put('admin_logged_in', true);
        $request->session()->put('admin_id', $admin->admin_id);
        $request->session()->put('admin_name', $admin->admin_name);
        $request->session()->put('admin_department_id', $admin->department_id);
        $request->session()->put('user_role', 'admin');

        return redirect()->route('admin.dashboard');
    }

    protected function loginDepartment(Request $request, $email, $password)
    {
        $department = Department::where('department_email', $email)->first();

        if (!$department || !Hash::check($password, $department->department_password)) {
            return back()->withInput($request->only('email'))->with('error', 'Invalid department email or password');
        }

        $request->session()->put('department_logged_in', true);
        $request->session()->put('department_id', $department->department_id);
        $request->session()->put('department_name', $department->department_name);
        $request->session()->put('user_role', 'department');

        // Redirect to appropriate department dashboard based on department name
        if (stripos($department->department_name, 'Business') !== false || stripos($department->department_email, 'business') !== false) {
            return redirect('/department/cbm');
        } elseif (stripos($department->department_name, 'Computer Science') !== false || stripos($department->department_email, 'cs') !== false) {
            return redirect('/department/css');
        } elseif (stripos($department->department_name, 'Engineering') !== false || stripos($department->department_email, 'eng') !== false) {
            return redirect('/department/engineering');
        } elseif (stripos($department->department_name, 'Education') !== false || stripos($department->department_email, 'educ') !== false) {
            return redirect('/department/educ');
        }

        // Default fallback
        return redirect('/department/dashboard');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        $request->session()->regenerate();
        
        return redirect()->route('login')->with('success', 'Logged out successfully');
    }
}
