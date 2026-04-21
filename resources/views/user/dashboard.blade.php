@extends('layouts.user.app')

@section('title', 'User Dashboard')

@section('content')

<div class="container mx-auto px-6 py-8">
    <!-- Welcome Section -->
    <div class="mb-8">
        <h1 class="text-4xl font-bold text-gray-800 mb-2">Welcome, {{ auth()->user()->name }}! 👋</h1>
        <p class="text-gray-600">Manage your clearance status and documents</p>
    </div>

    <!-- User Info Card -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm font-semibold mb-2">EMAIL ADDRESS</div>
            <p class="text-xl font-bold text-gray-800">{{ auth()->user()->email }}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm font-semibold mb-2">USER TYPE</div>
            <p class="text-xl font-bold text-gray-800 capitalize">{{ auth()->user()->user_type }}</p>
        </div>

        <div class="bg-white rounded-lg shadow p-6">
            <div class="text-gray-500 text-sm font-semibold mb-2">ACCOUNT STATUS</div>
            <p class="text-xl font-bold text-green-600">Active</p>
        </div>
    </div>

    <!-- Clearance Status Section -->
    <div class="bg-white rounded-lg shadow mb-8">
        <div class="px-6 py-4 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800">Clearance Status</h2>
        </div>

        <div class="p-6">
            <div class="space-y-4">
                @php
                    $departments = [
                        ['name' => 'Dean', 'status' => 'Pending'],
                        ['name' => 'Data Center', 'status' => 'Pending'],
                        ['name' => 'Library', 'status' => 'Pending'],
                        ['name' => 'Accounting', 'status' => 'Pending'],
                        ['name' => 'Registrar', 'status' => 'Pending'],
                    ];
                @endphp

                @foreach($departments as $dept)
                    <div class="flex items-center justify-between p-4 bg-gray-50 rounded border border-gray-200">
                        <div>
                            <p class="font-semibold text-gray-800">{{ $dept['name'] }}</p>
                            <p class="text-sm text-gray-500">Clearance required</p>
                        </div>
                        <span class="px-4 py-2 rounded-full text-sm font-semibold
                            @if($dept['status'] === 'Pending')
                                bg-yellow-100 text-yellow-800
                            @elseif($dept['status'] === 'Approved')
                                bg-green-100 text-green-800
                            @else
                                bg-red-100 text-red-800
                            @endif">
                            {{ $dept['status'] }}
                        </span>
                    </div>
                @endforeach
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
                📄 View Documents
            </button>
            <button class="px-6 py-3 bg-green-600 hover:bg-green-700 text-white rounded-lg font-semibold transition">
                📝 Request Clearance
            </button>
            <button class="px-6 py-3 bg-purple-600 hover:bg-purple-700 text-white rounded-lg font-semibold transition">
                💬 Contact Support
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
