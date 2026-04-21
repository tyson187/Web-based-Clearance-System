@extends('layouts.department.app')

@section('title', 'Department Dashboard')

@section('content')

<div class="container mx-auto px-6 py-8">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Welcome, {{ session('department_name') }}! 🏛️</h1>
        <p class="text-gray-600">Manage clearance requests and student approvals</p>
    </div>

    <!-- Department Info Card -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm font-semibold mb-2">DEPARTMENT EMAIL</div>
            <p class="text-xl font-bold text-gray-800 break-all">{{ session('department_email') ?? 'department@benedicto.edu' }}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm font-semibold mb-2">PENDING REQUESTS</div>
            <p class="text-3xl font-bold text-yellow-600">12</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm font-semibold mb-2">APPROVED TODAY</div>
            <p class="text-3xl font-bold text-green-600">8</p>
        </div>
    </div>

    <!-- Pending Clearances Section -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800">Pending Clearance Requests</h2>
        </div>

        <div class="p-6">
            <table class="w-full">
                <thead>
                    <tr class="border-b border-gray-200">
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Student ID</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Student Name</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Program</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Submission Date</th>
                        <th class="text-left py-3 px-4 font-semibold text-gray-700">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $students = [
                            ['id' => '2025-00021', 'name' => 'SIGMA, ALEX A.', 'program' => 'BS Information Technology', 'date' => '2026-04-15'],
                            ['id' => '2025-00022', 'name' => 'JOHNSON, MARIA', 'program' => 'BS Computer Science', 'date' => '2026-04-18'],
                            ['id' => '2025-00023', 'name' => 'GARCIA, ROBERT', 'program' => 'BS Engineering', 'date' => '2026-04-19'],
                        ];
                    @endphp

                    @foreach($students as $student)
                        <tr class="border-b border-gray-200 hover:bg-gray-50">
                            <td class="py-3 px-4 text-gray-800">{{ $student['id'] }}</td>
                            <td class="py-3 px-4 text-gray-800">{{ $student['name'] }}</td>
                            <td class="py-3 px-4 text-gray-800">{{ $student['program'] }}</td>
                            <td class="py-3 px-4 text-gray-800">{{ $student['date'] }}</td>
                            <td class="py-3 px-4">
                                <div class="flex gap-2">
                                    <button class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white rounded text-sm transition">
                                        Approve
                                    </button>
                                    <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white rounded text-sm transition">
                                        Reject
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Recent Activity Section -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">Recent Approvals</h2>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <p class="text-gray-600">✓ SIGMA, ALEX A. - Approved on 2026-04-20</p>
                    <p class="text-gray-600">✓ JOHNSON, MARIA - Approved on 2026-04-20</p>
                    <p class="text-gray-600">✓ GARCIA, ROBERT - Approved on 2026-04-19</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow">
            <div class="px-6 py-4 border-b border-gray-200">
                <h2 class="text-xl font-bold text-gray-800">Statistics</h2>
            </div>
            <div class="p-6">
                <div class="space-y-3">
                    <p class="text-gray-600">Total Requests: <strong>45</strong></p>
                    <p class="text-gray-600">Approved: <strong>32</strong></p>
                    <p class="text-gray-600">Rejected: <strong>5</strong></p>
                    <p class="text-gray-600">Pending: <strong>8</strong></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800">Quick Actions</h2>
        </div>

        <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-4">
            <button class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg font-semibold transition">
                📊 View Reports
            </button>
            <button class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition">
                📥 Download Data
            </button>
            <button class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-semibold transition">
                ⚙️ Settings
            </button>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="w-full px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg font-semibold transition">
                    🚪 Logout
                </button>
            </form>
        </div>
    </div>
</div>

<style>
    body {
        background-color: #f3f4f6;
    }
    .container {
        max-width: 1200px;
    }
</style>

@endsection
