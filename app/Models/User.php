<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'role'];

    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }

    public function restaurants()
    {
        return $this->hasMany(Restaurant::class);
    }
}

