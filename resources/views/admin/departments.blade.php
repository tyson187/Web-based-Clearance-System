@extends('layouts.admin.app')

@section('title', 'Departments')

@section('content')

<h2 class="text-2xl font-bold mb-4">Departments</h2>

<div class="bg-white p-4 rounded shadow">
    <ul class="space-y-2">
        @foreach($departments as $d)
            <li class="border p-2 rounded">{{ $d->name }}</li>
        @endforeach
    </ul>
</div>

@endsection
``