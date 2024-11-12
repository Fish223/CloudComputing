<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name', 'description', 'location', 'average_price', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'restaurant_category');
    }

    public function images()
    {
        return $this->hasMany(RestaurantImage::class);
    }

    public function tables()
    {
        return $this->hasMany(Table::class);
    }

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}

