<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Show Engineering Department Dashboard
     */
    public function engineering()
    {
        $name = session('department_name') ?? 'Santos, Pedro';
        $email = session('department_email') ?? 'pedro.santos@gmail.com';
        
        $students = [
            [
                'id' => '2025-00031',
                'name' => 'REYES, CARLOS',
                'course' => 'BS CIVIL ENGINEERING',
                'status' => 'PENDING'
            ],
            [
                'id' => '2025-00032',
                'name' => 'MANUEL, JOSE',
                'course' => 'BS MECHANICAL ENGINEERING',
                'status' => 'APPROVED'
            ],
            [
                'id' => '2025-00033',
                'name' => 'GARCIA, LUIS',
                'course' => 'BS ELECTRICAL ENGINEERING',
                'status' => 'PENDING'
            ],
            [
                'id' => '2025-00034',
                'name' => 'TORRES, ANTONIO',
                'course' => 'BS CHEMICAL ENGINEERING',
                'status' => 'APPROVED'
            ]
        ];

        return view('department.deanENG', [
            'name' => $name,
            'email' => $email,
            'students' => $students
        ]);
    }

    /**
     * Show Department Dashboard
     */
    public function dashboard()
    {
        return view('department.dashboard');
    }

    /**
     * Search students
     */
    public function searchStudents(Request $request)
    {
        $search = $request->input('search', '');
        
        $students = [
            [
                'id' => '2025-00031',
                'name' => 'REYES, CARLOS',
                'course' => 'BS CIVIL ENGINEERING',
                'status' => 'PENDING'
            ],
            [
                'id' => '2025-00032',
                'name' => 'MANUEL, JOSE',
                'course' => 'BS MECHANICAL ENGINEERING',
                'status' => 'APPROVED'
            ],
            [
                'id' => '2025-00033',
                'name' => 'GARCIA, LUIS',
                'course' => 'BS ELECTRICAL ENGINEERING',
                'status' => 'PENDING'
            ],
            [
                'id' => '2025-00034',
                'name' => 'TORRES, ANTONIO',
                'course' => 'BS CHEMICAL ENGINEERING',
                'status' => 'APPROVED'
            ]
        ];

        // Filter students based on search
        if ($search) {
            $students = array_filter($students, function ($student) use ($search) {
                return stripos($student['name'], $search) !== false || 
                       stripos($student['id'], $search) !== false;
            });
        }

        return response()->json($students);
    }

    /**
     * Approve clearance for a student
     */
    public function approveClearance($studentId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Clearance approved for student ' . $studentId
        ]);
    }

    /**
     * Reject clearance for a student
     */
    public function rejectClearance($studentId)
    {
        return response()->json([
            'success' => true,
            'message' => 'Clearance rejected for student ' . $studentId
        ]);
    }
}
