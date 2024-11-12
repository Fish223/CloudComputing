<?php
namespace Database\Seeders;

use App\Models\Reservation;
use Illuminate\Database\Seeder;

class ReservationSeeder extends Seeder
{
    public function run()
    {
        Reservation::create([
            'user_id' => 2, // Customer user
            'restaurant_id' => 1,
            'table_id' => 1,
            'reservation_time' => now()->addDays(1),
            'guest_count' => 2,
            'status' => 'confirmed'
        ]);
    }
}

