<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class DepartmentAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample departments with static passwords
        $departments = [
            [
                'department_name' => 'Computer Science Department',
                'department_email' => 'cs@benedicto.edu',
                'department_password' => Hash::make('cs_dept_2026'),
            ],
            [
                'department_name' => 'Engineering Department',
                'department_email' => 'eng@benedicto.edu',
                'department_password' => Hash::make('eng_dept_2026'),
            ],
            [
                'department_name' => 'Business Department',
                'department_email' => 'business@benedicto.edu',
                'department_password' => Hash::make('business_dept_2026'),
            ],
        ];

        foreach ($departments as $dept) {
            Department::create($dept);
        }

        // Create sample admins
        $admins = [
            [
                'admin_name' => 'Dr. John Smith',
                'admin_email' => 'john.smith@benedicto.edu',
                'admin_password' => Hash::make('admin_2026'),
                'department_id' => 1,
                'can_edit_status' => true,
                'can_approve_clearance' => true,
                'can_add_remarks' => true,
            ],
            [
                'admin_name' => 'Prof. Maria Garcia',
                'admin_email' => 'maria.garcia@benedicto.edu',
                'admin_password' => Hash::make('admin_2026'),
                'department_id' => 2,
                'can_edit_status' => true,
                'can_approve_clearance' => true,
                'can_add_remarks' => true,
            ],
            [
                'admin_name' => 'Dr. Robert Johnson',
                'admin_email' => 'robert.johnson@benedicto.edu',
                'admin_password' => Hash::make('admin_2026'),
                'department_id' => 3,
                'can_edit_status' => true,
                'can_approve_clearance' => true,
                'can_add_remarks' => true,
            ],
        ];

        foreach ($admins as $admin) {
            Admin::create($admin);
        }

        echo "✓ Departments and Admins seeded successfully!\n";
        echo "\nDepartment Credentials:\n";
        echo "- Email: cs@benedicto.edu | Password: cs_dept_2026\n";
        echo "- Email: eng@benedicto.edu | Password: eng_dept_2026\n";
        echo "- Email: business@benedicto.edu | Password: business_dept_2026\n";
        echo "\nAdmin Credentials:\n";
        echo "- Email: john.smith@benedicto.edu | Password: admin_2026\n";
        echo "- Email: maria.garcia@benedicto.edu | Password: admin_2026\n";
        echo "- Email: robert.johnson@benedicto.edu | Password: admin_2026\n";
    }
}
