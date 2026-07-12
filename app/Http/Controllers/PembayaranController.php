<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Booking;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    public function index()
    {
        $pembayarans = Pembayaran::with('booking.customer', 'booking.lapangan')->get();

        return view('pembayarans.index', compact('pembayarans'));
    }

    public function create()
    {
        $bookings = Booking::where('status', '!=', 'Lunas')->get();

        return view('pembayarans.create', compact('bookings'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'booking_id'      => 'required',
            'tanggal_bayar'   => 'required|date',
            'metode_bayar'    => 'required',
            'total_bayar'     => 'required|numeric',
            'uang_dibayar'    => 'required|numeric'
        ]);

        if ($request->uang_dibayar < $request->total_bayar) {
            return back()
                ->withInput()
                ->with('error', 'Uang pembayaran kurang.');
        }

        $kembalian = $request->uang_dibayar - $request->total_bayar;

        Pembayaran::create([
            'booking_id'    => $request->booking_id,
            'tanggal_bayar' => $request->tanggal_bayar,
            'metode_bayar'  => $request->metode_bayar,
            'total_bayar'   => $request->total_bayar,
            'uang_dibayar'  => $request->uang_dibayar,
            'kembalian'     => $kembalian,
            'status'        => 'Lunas'
        ]);

        Booking::where('id', $request->booking_id)
            ->update([
                'status' => 'Lunas'
            ]);

        return redirect()
            ->route('pembayarans.index')
            ->with('success', 'Pembayaran berhasil.');
    }

    public function show(Pembayaran $pembayaran)
    {
        //
    }

    public function edit(Pembayaran $pembayaran)
    {
        //
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        //
    }

    public function destroy(Pembayaran $pembayaran)
    {
        $pembayaran->delete();

        return redirect()
            ->route('pembayarans.index')
            ->with('success', 'Data pembayaran berhasil dihapus.');
    }
}