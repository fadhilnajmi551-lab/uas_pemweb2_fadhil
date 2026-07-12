<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'nama',
        'no_hp',
        'email',
        'alamat'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}