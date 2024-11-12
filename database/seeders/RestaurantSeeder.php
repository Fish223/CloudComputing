<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    public function run()
    {
        Restaurant::create([
            'name' => 'Delicious Italian',
            'description' => 'Italian cuisine with authentic flavors.',
            'location' => 'Downtown City Center',
            'average_price' => 20.50,
            'user_id' => 1, // Assuming this is the admin's user ID
        ]);
    }
}

