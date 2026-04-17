@extends('layouts.admin.app')

@section('title', 'Students')

@section('content')

<h2 class="text-2xl font-bold mb-4">Students List</h2>

<div class="bg-white p-4 rounded shadow">
    <table class="w-full table-auto">
        <thead>
            <tr class="bg-gray-100">
                <th class="p-2 text-left">ID</th>
                <th class="p-2 text-left">Name</th>
                <th class="p-2 text-left">Course</th>
                <th class="p-2 text-left">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($students as $student)
            <tr class="border-b">
                <td class="p-2">{{ $student->id }}</td>
                <td class="p-2">{{ $student->name }}</td>
                <td class="p-2">{{ $student->course }}</td>
                <td class="p-2">
                    <a href="#" class="text-blue-500">View</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection