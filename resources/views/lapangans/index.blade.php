@extends('layouts.app')

@section('content')

<h2 class="mb-3">Data Lapangan</h2>

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div class="d-flex justify-content-end mb-3">
    <a href="{{ route('lapangans.create') }}" class="btn btn-success">
        + Tambah Lapangan
    </a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-success">
        <tr>
            <th>No</th>
            <th>Nama Lapangan</th>
            <th>Jenis</th>
            <th>Harga/Jam</th>
            <th>Status</th>
            <th width="180">Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse($lapangans as $lapangan)

    <tr>

        <td>{{ $loop->iteration }}</td>

        <td>{{ $lapangan->nama_lapangan }}</td>

        <td>{{ $lapangan->jenis_lapangan }}</td>

        <td>Rp {{ number_format($lapangan->harga_per_jam,0,',','.') }}</td>

        <td>{{ $lapangan->status }}</td>

        <td>

            <a href="{{ route('lapangans.edit', $lapangan->id) }}"
                class="btn btn-warning btn-sm">
                Edit
            </a>

            <form action="{{ route('lapangans.destroy', $lapangan->id) }}"
                method="POST"
                style="display:inline;">

                @csrf
                @method('DELETE')

                <button
                    onclick="return confirm('Yakin ingin menghapus data ini?')"
                    class="btn btn-danger btn-sm">

                    Hapus

                </button>

            </form>

        </td>

    </tr>

    @empty

    <tr>
        <td colspan="6" class="text-center">
            Belum ada data lapangan.
        </td>
    </tr>

    @endforelse

    </tbody>

</table>

@endsection