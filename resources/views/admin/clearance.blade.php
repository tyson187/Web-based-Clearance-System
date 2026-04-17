@extends('layouts.admin.app')

@section('title', 'Clearance')

@section('content')

<h2 class="text-2xl font-bold mb-4">Clearance Management</h2>

<div class="bg-white p-4 rounded shadow">
    <table class="w-full border">
        <thead class="bg-slate-800 text-white">
            <tr>
                <th class="p-2">Student</th>
                <th class="p-2">Department</th>
                <th class="p-2">Status</th>
                <th class="p-2">Action</th>
            </tr>
        </thead>

        @include('layouts.partials.admin.table-clearance')

    </table>
</div>

@endsection