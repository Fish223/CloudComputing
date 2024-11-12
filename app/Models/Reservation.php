<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $fillable = ['user_id', 'restaurant_id', 'table_id', 'reservation_time', 'guest_count', 'status'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(Restaurant::class);
    }

    public function table()
    {
        return $this->belongsTo(Table::class);
    }
}

