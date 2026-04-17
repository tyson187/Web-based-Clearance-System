@extends('layouts.admin.app')

@section('title', 'Admin Dashboard')

@section('content')

<h2 class="text-2xl font-bold mb-4">Registrar</h2>

<!-- PROFILE -->
<div class="bg-white p-4 rounded shadow flex justify-between items-center mb-4">
    <div>
        <p class="font-bold">Last Name, First Name</p>
        <p class="text-sm text-gray-500">email@example.com</p>
    </div>

    <div>
        <input type="text" placeholder="Search Name/ID" class="border p-2 rounded">
        <button class="bg-blue-500 text-white px-3 py-2 rounded">Search</button>
    </div>
</div>

<!-- TABLE -->
<div class="bg-white p-4 rounded shadow">
    <table class="w-full border">
        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="p-2">Student ID</th>
                <th class="p-2">Student Name</th>
                <th class="p-2">Course</th>
                <th class="p-2">Status</th>
            </tr>
        </thead>

        <tbody>
        @foreach($students as $s)
            <tr class="border-b text-center">
                <td class="p-2">{{ $s->id }}</td>
                <td class="p-2">{{ $s->name }}</td>
                <td class="p-2">{{ $s->course }}</td>
                <td class="p-2">
                    <span class="bg-yellow-400 text-white px-2 py-1 rounded">
                        Pending
                    </span>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection