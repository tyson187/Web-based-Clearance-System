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
     * Show CBM (College of Business and Management) Department Dashboard
     */
    public function cbm()
    {
        $name = session('department_name') ?? 'Zoilo, Jaype';
        $email = session('department_email') ?? 'jaypezoilo@gmail.com';
        
        $students = [
            [
                'id' => '2025-00045',
                'name' => 'DELA CRUZ, JUAN',
                'course' => 'BSBA',
                'status' => 'PENDING'
            ],
            [
                'id' => '2025-00046',
                'name' => 'SANTOS, MARIA',
                'course' => 'BSBA',
                'status' => 'APPROVED'
            ],
            [
                'id' => '2025-00047',
                'name' => 'GARCIA, PEDRO',
                'course' => 'BSBA',
                'status' => 'PENDING'
            ]
        ];

        return view('department.deanCBM', [
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
     * Show CSS (Computer Science) Department Dashboard
     */
    public function css()
    {
        $name = session('department_name') ?? 'Dr. Smith';
        $email = session('department_email') ?? 'cs@benedicto.edu';
        
        $students = [
            [
                'id' => '2025-00001',
                'name' => 'REYES, CARLOS',
                'course' => 'BS COMPUTER SCIENCE',
                'status' => 'PENDING'
            ],
            [
                'id' => '2025-00002',
                'name' => 'MANUEL, JOSE',
                'course' => 'BS COMPUTER SCIENCE',
                'status' => 'APPROVED'
            ],
            [
                'id' => '2025-00003',
                'name' => 'GARCIA, LUIS',
                'course' => 'BS COMPUTER SCIENCE',
                'status' => 'PENDING'
            ]
        ];

        return view('department.deanCSS', [
            'name' => $name,
            'email' => $email,
            'students' => $students
        ]);
    }

    /**
     * Show EDUC (Education) Department Dashboard
     */
    public function educ()
    {
        $name = session('department_name') ?? 'Dr. Johnson';
        $email = session('department_email') ?? 'educ@benedicto.edu';
        
        $students = [
            [
                'id' => '2025-00051',
                'name' => 'TORRES, ANTONIO',
                'course' => 'BS EDUCATION',
                'status' => 'PENDING'
            ],
            [
                'id' => '2025-00052',
                'name' => 'RIVERA, ISABEL',
                'course' => 'BS EDUCATION',
                'status' => 'APPROVED'
            ],
            [
                'id' => '2025-00053',
                'name' => 'SANTOS, PABLO',
                'course' => 'BS EDUCATION',
                'status' => 'PENDING'
            ]
        ];

        return view('department.deanEDUC', [
            'name' => $name,
            'email' => $email,
            'students' => $students
        ]);
    }

    public function library()
    {
        $name = session('department_name') ?? 'Dr. Angela Cruz';
        $email = session('department_email') ?? 'library@benedicto.edu';
        
        $students = [
            [
                'id' => '2025-00001',
                'name' => 'REYES, CARLOS',
                'course' => 'BS COMPUTER SCIENCE',
                'status' => 'PENDING'
            ],
            [
                'id' => '2025-00002',
                'name' => 'MANUEL, JOSE',
                'course' => 'BS COMPUTER SCIENCE',
                'status' => 'APPROVED'
            ],
            [
                'id' => '2025-00003',
                'name' => 'GARCIA, LUIS',
                'course' => 'BS COMPUTER SCIENCE',
                'status' => 'PENDING'
            ]
        ];

        return view('department.library', [
            'name' => $name,
            'email' => $email,
            'students' => $students
        ]);
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
