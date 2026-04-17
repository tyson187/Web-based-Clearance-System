@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('content')

<h2 class="text-2xl font-bold mb-4">Registrar</h2>

<div class="registrar-panel mb-6">
    <div class="profile-card">
        <div class="profile-avatar"></div>
        <div>
            <p class="profile-name">Last Name, First Name</p>
            <p class="profile-email">email@example.com</p>
        </div>
    </div>

    <div class="registrar-controls">
        <div class="search-box">
            <input type="text" placeholder="Search Name/ID" class="search-input">
            <button class="btn btn-primary">Search</button>
        </div>
    </div>
</div>

<div class="bg-white p-4 rounded shadow">
    <table class="w-full status-table">
        <thead>
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $s)
            <tr>
                <td>{{ $s->id }}</td>
                <td>{{ $s->name }}</td>
                <td>{{ $s->course }}</td>
                <td>
                    <span class="status-badge pending">Pending</span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection