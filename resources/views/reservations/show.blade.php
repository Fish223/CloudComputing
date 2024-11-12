@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold">Reservation Details</h2>
    <p>Restaurant: {{ $reservation->restaurant->name }}</p>
    <p>Reservation Time: {{ $reservation->reservation_time }}</p>
    <p>Guest Count: {{ $reservation->guest_count }}</p>
    <p>Status: {{ $reservation->status }}</p>

    <a href="{{ route('reservations.edit', $reservation->id) }}" class="text-blue-500">Edit Reservation</a>
</div>
@endsection
