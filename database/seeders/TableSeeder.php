<?php

namespace Database\Seeders;

use App\Models\Table;
use Illuminate\Database\Seeder;

class TableSeeder extends Seeder
{
    public function run()
    {
        Table::create([
            'restaurant_id' => 1,
            'number' => 1,
            'seats' => 4
        ]);
    }
}
