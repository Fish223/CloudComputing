<?php

namespace App\Http\Controllers;

use App\Models\Restaurant;
use App\Models\Category;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        // Filter berdasarkan lokasi dan kategori
        $query = Restaurant::query()->with('categories', 'images');

        if ($request->has('location')) {
            $query->where('location', 'like', '%' . $request->location . '%');
        }

        if ($request->has('category_id')) {
            $query->whereHas('categories', function ($q) use ($request) {
                $q->where('category_id', $request->category_id);
            });
        }

        $restaurants = $query->get();
        $categories = Category::all();

        return view('restaurants.index', compact('restaurants', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('restaurants.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'average_price' => 'required|numeric',
        ]);

        $restaurant = Restaurant::create($request->all());

        // Tambahkan kategori ke restoran
        if ($request->has('categories')) {
            $restaurant->categories()->sync($request->categories);
        }

        return redirect()->route('restaurants.index')
                         ->with('success', 'Restaurant created successfully.');
    }

    public function show($id)
    {
        $restaurant = Restaurant::with('images', 'tables', 'categories')->findOrFail($id);
        return view('restaurants.show', compact('restaurant'));
    }

    public function edit($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $categories = Category::all();

        return view('restaurants.edit', compact('restaurant', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'average_price' => 'required|numeric',
        ]);

        $restaurant = Restaurant::findOrFail($id);
        $restaurant->update($request->all());

        // Update kategori
        if ($request->has('categories')) {
            $restaurant->categories()->sync($request->categories);
        }

        return redirect()->route('restaurants.index')
                         ->with('success', 'Restaurant updated successfully.');
    }

    public function destroy($id)
    {
        $restaurant = Restaurant::findOrFail($id);
        $restaurant->delete();

        return redirect()->route('restaurants.index')
                         ->with('success', 'Restaurant deleted successfully.');
    }
}


