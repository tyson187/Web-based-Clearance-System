@extends('layouts.admin.app')

@section('title', 'Student')

@section('content')

<div class="grid grid-cols-1 md:grid-cols-3 gap-4">

    <!-- PROFILE CARD -->
    <div class="bg-white p-4 rounded shadow text-center">
        <div class="w-24 h-24 mx-auto bg-gray-300 rounded-full mb-3"></div>

        <h3 class="font-bold">SIGMA, ALEX A.</h3>
        <p class="text-sm text-gray-500">2025-00021</p>

        <div class="text-left mt-4 text-sm">
            <p><b>Program:</b> BSIT</p>
            <p><b>Year:</b> 4th Year</p>
            <p><b>Email:</b> student@email.com</p>
        </div>
    </div>

    <!-- CLEARANCE STATUS -->
    <div class="md:col-span-2 bg-white p-4 rounded shadow">

        @foreach($clearance as $c)
        <div class="flex justify-between items-center border-b py-2">
            <span>{{ $c->office }}</span>

            <span class="
                px-3 py-1 rounded text-white
                @if($c->status == 'Approved') bg-green-500
                @else bg-orange-500
                @endif
            ">
                {{ $c->status }}
            </span>
        </div>
        @endforeach

    </div>

</div>

@endsection