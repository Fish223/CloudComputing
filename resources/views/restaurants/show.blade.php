@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold">{{ $restaurant->name }}</h2>
    <p>{{ $restaurant->location }}</p>
    <p>Average Price: ${{ $restaurant->average_price }}</p>

    <h3 class="text-xl font-semibold mt-4">Categories</h3>
    <ul>
        @foreach($restaurant->categories as $category)
            <li>{{ $category->name }}</li>
        @endforeach
    </ul>

    <h3 class="text-xl font-semibold mt-4">Images</h3>
    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
        @foreach($restaurant->images as $image)
            <img src="{{ asset($image->image_path) }}" alt="{{ $image->caption }}" class="rounded">
        @endforeach
    </div>

    <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="text-blue-500">Edit Restaurant</a>
</div>
@endsection
