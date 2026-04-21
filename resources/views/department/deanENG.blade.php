@extends('layouts.department.app')

@section('content')
<div class="title">COLLEGE OF ENGINEERING</div>

<div class="container">

    <!-- PROFILE -->
    <div class="profile">
        <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png" alt="Profile">
        <div>
            <h3>{{ $name ?? 'Santos, Pedro' }}</h3>
            <p>email: {{ $email ?? 'pedro.santos@gmail.com' }}</p>
        </div>
    </div>

    <!-- SEARCH -->
    <form method="GET" class="search-box" action="{{ route('department.search') }}">
        <input type="text" name="search" placeholder="Search Name/ID" value="{{ request('search', '') }}">
        <button type="submit">Search</button>
    </form>

    <!-- TABLE -->
    <table>
        <thead>
            <tr>
                <th>School ID</th>
                <th>Student Name</th>
                <th>Course</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($students as $student)
                <tr>
                    <td>{{ $student['id'] }}</td>
                    <td>{{ $student['name'] }}</td>
                    <td>{{ $student['course'] }}</td>
                    <td>
                        <span class="status {{ strtolower($student['status']) }}">
                            {{ $student['status'] }}
                        </span>
                    </td>
                    <td>
                        <form method="POST" style="display:inline;">
                            @csrf
                            @if($student['status'] === 'PENDING')
                                <button type="submit" formaction="{{ route('department.clearance.approve', $student['id']) }}" class="btn-approve">Approve</button>
                                <button type="submit" formaction="{{ route('department.clearance.reject', $student['id']) }}" class="btn-reject">Reject</button>
                            @else
                                <span class="text-muted">—</span>
                            @endif
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center text-muted">No students found</td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

<style>
    .title {
        background: #1e4fbf;
        color: white;
        text-align: center;
        padding: 10px;
        font-weight: bold;
    }

    .container {
        padding: 20px;
        background: #f0f0f0;
        min-height: 90vh;
    }

    .profile {
        display: flex;
        align-items: center;
        gap: 15px;
        margin-bottom: 20px;
    }

    .profile img {
        width: 60px;
        height: 60px;
        border-radius: 50%;
    }

    .search-box {
        display: flex;
        justify-content: flex-end;
        margin-bottom: 10px;
        gap: 0;
    }

    .search-box input {
        padding: 8px;
        width: 250px;
        border: none;
        border-radius: 5px 0 0 5px;
    }

    .search-box button {
        padding: 8px 15px;
        border: none;
        background: #1e4fbf;
        color: white;
        border-radius: 0 20px 20px 0;
        cursor: pointer;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        background: white;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    th {
        background: #e0e0e0;
        font-weight: bold;
    }

    .status {
        padding: 5px 12px;
        border-radius: 15px;
        color: white;
        font-size: 12px;
        display: inline-block;
    }

    .status.pending {
        background: #ff7a1a;
    }

    .status.approved {
        background: #28a745;
    }

    .btn-approve {
        background: #28a745;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
        margin-right: 5px;
    }

    .btn-approve:hover {
        background: #218838;
    }

    .btn-reject {
        background: #dc3545;
        color: white;
        border: none;
        padding: 5px 10px;
        border-radius: 5px;
        cursor: pointer;
    }

    .btn-reject:hover {
        background: #c82333;
    }

    .text-muted {
        color: #999;
    }

    .text-center {
        text-align: center;
    }
</style>
@endsection
