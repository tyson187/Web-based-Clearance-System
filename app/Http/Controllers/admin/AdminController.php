<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /* =======================
     * DASHBOARD
     * ======================= */
    public function dashboard()
    {
        $students = [
            (object)[
                'id' => '2025-001',
                'name' => 'SIGMA, ALEX',
                'course' => 'BSIT'
            ]
        ];

        return view('admin.dashboard', compact('students'));
    }

    /* =======================
     * STUDENTS LIST
     * ======================= */
    public function students()
    {
        $students = [
            (object)[
                'id' => '2025-001',
                'name' => 'SIGMA, ALEX',
                'course' => 'BSIT'
            ]
        ];

        return view('admin.students', compact('students'));
    }

    /* =======================
     * STUDENT CLEARANCE VIEW
     * ======================= */
    public function student()
    {
        $clearance = [
            (object)['office' => 'Dean', 'status' => 'Approved'],
            (object)['office' => 'Data Center', 'status' => 'Approved'],
            (object)['office' => 'Library', 'status' => 'Pending'],
            (object)['office' => 'Accounting', 'status' => 'Pending'],
            (object)['office' => 'Registrar', 'status' => 'Pending'],
        ];

        return view('admin.students_profile', compact('clearance'));
    }

    /* =======================
     * DEPARTMENTS
     * ======================= */
    public function departments()
    {
        $departments = [
            (object)['name' => 'Dean'],
            (object)['name' => 'Data Center'],
            (object)['name' => 'Library'],
            (object)['name' => 'Accounting'],
            (object)['name' => 'Registrar']
        ];

        return view('admin.departments', compact('departments'));
    }

    /* =======================
     * CLEARANCE MANAGEMENT
     * ======================= */
    public function clearance()
    {
        $clearances = [
            (object)[
                'id' => 1,
                'student_name' => 'SIGMA, ALEX',
                'department' => 'Library',
                'status' => 'Pending'
            ]
        ];

        return view('admin.clearance', compact('clearances'));
    }

    /* =======================
     * CLEARANCE ACTIONS
     * ======================= */
    public function approve($id)
    {
        return redirect()->back()->with('success', 'Clearance approved.');
    }

    public function reject($id)
    {
        return redirect()->back()->with('error', 'Clearance rejected.');
    }
}