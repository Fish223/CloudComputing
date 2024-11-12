@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold">Restaurants</h2>

    <!-- Filter berdasarkan lokasi dan kategori -->
    <form action="{{ route('restaurants.index') }}" method="GET" class="my-4">
        <input type="text" name="location" placeholder="Location" value="{{ request('location') }}" class="border p-2 mr-2">
        <select name="category_id" class="border p-2">
            <option value="">All Categories</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Filter</button>
    </form>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
        @foreach($restaurants as $restaurant)
            <div class="bg-white p-4 shadow rounded">
                <h3 class="text-lg font-bold">{{ $restaurant->name }}</h3>
                <p>{{ $restaurant->location }}</p>
                <a href="{{ route('restaurants.show', $restaurant->id) }}" class="text-blue-500">View Details</a>
            </div>
        @endforeach
    </div>
</div>
@endsection
