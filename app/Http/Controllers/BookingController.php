<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\Lapangan;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['customer', 'lapangan'])->get();

        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $customers = Customer::all();
        $lapangans = Lapangan::where('status', 'Tersedia')->get();

        return view('bookings.create', compact('customers', 'lapangans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer_id' => 'required',
            'lapangan_id' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'total_harga' => 'required|numeric',
            'status' => 'required'
        ]);

        // Cek apakah lapangan sudah dibooking pada waktu yang sama
        $bentrok = Booking::where('lapangan_id', $request->lapangan_id)
            ->where('tanggal', $request->tanggal)
            ->where(function ($query) use ($request) {

                $query->where(function ($q) use ($request) {
                    $q->where('jam_mulai', '<', $request->jam_selesai)
                      ->where('jam_selesai', '>', $request->jam_mulai);
                });

            })
            ->exists();

        if ($bentrok) {

            return back()
                ->withInput()
                ->with('error', 'Lapangan sudah dibooking pada jam tersebut.');

        }

        Booking::create([
            'customer_id' => $request->customer_id,
            'lapangan_id' => $request->lapangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'total_harga' => $request->total_harga,
            'status' => $request->status
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil ditambahkan.');
    }

    public function show(Booking $booking)
    {
        //
    }

    public function edit(Booking $booking)
    {
        $customers = Customer::all();
        $lapangans = Lapangan::all();

        return view('bookings.edit', compact(
            'booking',
            'customers',
            'lapangans'
        ));
    }

    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'customer_id' => 'required',
            'lapangan_id' => 'required',
            'tanggal' => 'required|date',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
            'total_harga' => 'required|numeric',
            'status' => 'required'
        ]);

        // Cek bentrok selain data yang sedang diedit
        $bentrok = Booking::where('lapangan_id', $request->lapangan_id)
            ->where('tanggal', $request->tanggal)
            ->where('id', '!=', $booking->id)
            ->where(function ($query) use ($request) {

                $query->where(function ($q) use ($request) {
                    $q->where('jam_mulai', '<', $request->jam_selesai)
                      ->where('jam_selesai', '>', $request->jam_mulai);
                });

            })
            ->exists();

        if ($bentrok) {

            return back()
                ->withInput()
                ->with('error', 'Lapangan sudah dibooking pada jam tersebut.');

        }

        $booking->update([
            'customer_id' => $request->customer_id,
            'lapangan_id' => $request->lapangan_id,
            'tanggal' => $request->tanggal,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'total_harga' => $request->total_harga,
            'status' => $request->status
        ]);

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil diperbarui.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()
            ->route('bookings.index')
            ->with('success', 'Booking berhasil dihapus.');
    }
}