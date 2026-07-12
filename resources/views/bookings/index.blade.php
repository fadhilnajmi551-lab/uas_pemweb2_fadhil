@extends('layouts.app')

@section('content')

<h2 class="mb-3">Data Booking</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('bookings.create') }}" class="btn btn-success">
        + Tambah Booking
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Lapangan</th>
            <th>Tanggal</th>
            <th>Jam</th>
            <th>Total Harga</th>
            <th>Status</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse($bookings as $booking)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $booking->customer->nama }}</td>

        <td>{{ $booking->lapangan->nama_lapangan }}</td>

        <td>{{ $booking->tanggal }}</td>

        <td>{{ $booking->jam_mulai }} - {{ $booking->jam_selesai }}</td>

        <td>Rp {{ number_format($booking->total_harga,0,',','.') }}</td>

        <td>{{ $booking->status }}</td>

        <td>

            <a href="{{ route('bookings.edit',$booking->id) }}"
                class="btn btn-warning btn-sm">

                Edit

            </a>

            <form action="{{ route('bookings.destroy',$booking->id) }}"
                method="POST"
                style="display:inline;">

                @csrf
                @method('DELETE')

                <button
                    class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin ingin menghapus booking ini?')">

                    Hapus

                </button>

            </form>

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="8" class="text-center">

            Belum ada data booking.

        </td>

    </tr>

    @endforelse

    </tbody>

</table>

@endsection