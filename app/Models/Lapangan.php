<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lapangan extends Model
{
    protected $table = 'lapangans';

    protected $fillable = [
        'nama_lapangan',
        'jenis_lapangan',
        'harga_per_jam',
        'status'
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}