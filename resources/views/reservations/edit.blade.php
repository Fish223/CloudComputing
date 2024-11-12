@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold">Edit Reservation</h2>

    <form action="{{ route('reservations.update', $reservation->id) }}" method="POST" class="mt-4">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label class="block font-bold">Reservation Time</label>
            <input type="datetime-local" name="reservation_time" value="{{ $reservation->reservation_time->format('Y-m-d\TH:i') }}" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Guest Count</label>
            <input type="number" name="guest_count" value="{{ $reservation->guest_count }}" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Select Table</label>
            <select name="table_id" class="border p-2 w-full" required>
                @foreach($reservation->restaurant->tables as $table)
                    <option value="{{ $table->id }}" {{ $table->id == $reservation->table_id ? 'selected' : '' }}>Table {{ $table->number }} (Seats: {{ $table->seats }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Update Reservation</button>
    </form>
</div>
@endsection
