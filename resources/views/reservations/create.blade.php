@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold">Reserve a Table at {{ $restaurant->name }}</h2>

    <form action="{{ route('restaurants.reserve.store', $restaurant->id) }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label class="block font-bold">Reservation Time</label>
            <input type="datetime-local" name="reservation_time" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Guest Count</label>
            <input type="number" name="guest_count" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Select Table</label>
            <select name="table_id" class="border p-2 w-full" required>
                @foreach($restaurant->tables as $table)
                    <option value="{{ $table->id }}">Table {{ $table->number }} (Seats: {{ $table->seats }})</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Reserve</button>
    </form>
</div>
@endsection
