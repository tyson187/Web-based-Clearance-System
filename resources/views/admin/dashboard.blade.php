@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('content')

<h2 class="text-2xl font-bold mb-6">Admin Dashboard</h2>

<!-- CARDS -->
<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-600">Total Students</h3>
        <p class="text-2xl font-bold">120</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-600">Pending</h3>
        <p class="text-2xl font-bold text-yellow-500">35</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-600">Approved</h3>
        <p class="text-2xl font-bold text-green-500">70</p>
    </div>

    <div class="bg-white p-4 rounded shadow">
        <h3 class="text-gray-600">Rejected</h3>
        <p class="text-2xl font-bold text-red-500">15</p>
    </div>

</div>

<!-- TABLE -->
<div class="mt-8 bg-white rounded shadow p-4">
    <h3 class="text-lg font-semibold mb-4">Recent Clearance Requests</h3>

    <table class="w-full border">
        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="p-2 text-left">Student</th>
                <th class="p-2 text-left">Department</th>
                <th class="p-2 text-left">Status</th>
                <th class="p-2 text-left">Date</th>
            </tr>
        </thead>

        <tbody>
            <tr class="border-b">
                <td class="p-2">Juan Dela Cruz</td>
                <td class="p-2">IT</td>
                <td class="p-2 text-yellow-500">Pending</td>
                <td class="p-2">2026-03-28</td>
            </tr>
        </tbody>
    </table>
</div>

@endsection