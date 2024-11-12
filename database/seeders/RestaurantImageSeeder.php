<?php
namespace Database\Seeders;

use App\Models\RestaurantImage;
use Illuminate\Database\Seeder;

class RestaurantImageSeeder extends Seeder
{
    public function run()
    {
        RestaurantImage::create([
            'restaurant_id' => 1,
            'image_path' => 'images/restaurants/delicious_italian.jpg',
            'caption' => 'Front view of Delicious Italian'
        ]);
    }
}

