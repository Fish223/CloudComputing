@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold">Your Reservations</h2>

    <div class="mt-4">
        @foreach($reservations as $reservation)
            <div class="bg-white p-4 shadow rounded mb-4">
                <h3 class="text-lg font-bold">{{ $reservation->restaurant->name }}</h3>
                <p>Reservation Time: {{ $reservation->reservation_time }}</p>
                <p>Guest Count: {{ $reservation->guest_count }}</p>
                <p>Status: {{ $reservation->status }}</p>
                <a href="{{ route('reservations.show', $reservation->id) }}" class="text-blue-500">View Details</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
