<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Restaurant;
use App\Models\Table;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with('restaurant', 'table')->where('user_id', auth()->id())->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create($restaurantId)
    {
        $restaurant = Restaurant::with('tables')->findOrFail($restaurantId);
        return view('reservations.create', compact('restaurant'));
    }

    public function store(Request $request, $restaurantId)
    {
        $request->validate([
            'reservation_time' => 'required|date',
            'guest_count' => 'required|integer',
            'table_id' => 'required|exists:tables,id',
        ]);

        // Cek ketersediaan meja
        $isAvailable = Reservation::where('table_id', $request->table_id)
                                  ->where('reservation_time', $request->reservation_time)
                                  ->doesntExist();

        if (!$isAvailable) {
            return back()->withErrors(['table_id' => 'Table is not available at this time.']);
        }

        Reservation::create([
            'user_id' => auth()->id(),
            'restaurant_id' => $restaurantId,
            'table_id' => $request->table_id,
            'reservation_time' => $request->reservation_time,
            'guest_count' => $request->guest_count,
            'status' => 'confirmed'
        ]);

        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation created successfully.');
    }

    public function show($id)
    {
        $reservation = Reservation::with('restaurant', 'table')->findOrFail($id);
        return view('reservations.show', compact('reservation'));
    }

    public function edit($id)
    {
        $reservation = Reservation::with('restaurant.tables')->findOrFail($id);
        return view('reservations.edit', compact('reservation'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'reservation_time' => 'required|date',
            'guest_count' => 'required|integer',
            'table_id' => 'required|exists:tables,id',
        ]);

        $reservation = Reservation::findOrFail($id);

        // Update status reservasi
        $reservation->update($request->all());

        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation updated successfully.');
    }

    public function destroy($id)
    {
        $reservation = Reservation::findOrFail($id);
        $reservation->delete();

        return redirect()->route('reservations.index')
                         ->with('success', 'Reservation cancelled successfully.');
    }
}
