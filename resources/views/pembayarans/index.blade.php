@extends('layouts.app')

@section('content')

<h2 class="mb-3">Data Pembayaran</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('pembayarans.create') }}" class="btn btn-success">
        + Pembayaran Baru
    </a>
</div>

<table class="table table-bordered table-striped">

    <thead class="table-success">

        <tr>
            <th>No</th>
            <th>Customer</th>
            <th>Lapangan</th>
            <th>Total</th>
            <th>Dibayar</th>
            <th>Kembalian</th>
            <th>Status</th>
        </tr>

    </thead>

    <tbody>

    @forelse($pembayarans as $pembayaran)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $pembayaran->booking->customer->nama }}</td>

        <td>{{ $pembayaran->booking->lapangan->nama_lapangan }}</td>

        <td>
            Rp {{ number_format($pembayaran->total_bayar,0,',','.') }}
        </td>

        <td>
            Rp {{ number_format($pembayaran->uang_dibayar,0,',','.') }}
        </td>

        <td>
            Rp {{ number_format($pembayaran->kembalian,0,',','.') }}
        </td>

        <td>

            <span class="badge bg-success">

                {{ $pembayaran->status }}

            </span>

        </td>

    </tr>

    @empty

    <tr>

        <td colspan="7" class="text-center">

            Belum ada pembayaran.

        </td>

    </tr>

    @endforelse

    </tbody>

</table>

@endsection