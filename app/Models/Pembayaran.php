<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = 'pembayarans';

    protected $fillable = [
        'booking_id',
        'tanggal_bayar',
        'metode_bayar',
        'total_bayar',
        'uang_dibayar',
        'kembalian',
        'status'
    ];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }
}