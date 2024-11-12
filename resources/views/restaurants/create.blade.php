@extends('layouts.app')

@section('content')
<div class="container mx-auto py-6">
    <h2 class="text-2xl font-semibold">Add New Restaurant</h2>

    <form action="{{ route('restaurants.store') }}" method="POST" class="mt-4">
        @csrf
        <div class="mb-4">
            <label class="block font-bold">Name</label>
            <input type="text" name="name" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Location</label>
            <input type="text" name="location" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Description</label>
            <input type="text" name="description" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Average Price</label>
            <input type="number" name="average_price" step="0.01" class="border p-2 w-full" required>
        </div>

        <div class="mb-4">
            <label class="block font-bold">Categories</label>
            <select name="categories[]" multiple class="border p-2 w-full">
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="bg-green-500 text-white px-4 py-2 rounded">Save</button>
    </form>
</div>
@endsection
