@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Edit Lapangan</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('lapangans.update', $lapangan->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-3">
                <label>Nama Lapangan</label>
                <input type="text" name="nama_lapangan" class="form-control"
                    value="{{ $lapangan->nama_lapangan }}">
            </div>

            <div class="mb-3">
                <label>Jenis Lapangan</label>

                <select name="jenis_lapangan" class="form-control">
                    <option value="Sintetis" {{ $lapangan->jenis_lapangan == 'Sintetis' ? 'selected' : '' }}>Sintetis</option>

                    <option value="Vinyl" {{ $lapangan->jenis_lapangan == 'Vinyl' ? 'selected' : '' }}>Vinyl</option>

                    <option value="Rumput" {{ $lapangan->jenis_lapangan == 'Rumput' ? 'selected' : '' }}>Rumput</option>
                </select>
            </div>

            <div class="mb-3">
                <label>Harga per Jam</label>
                <input type="number" name="harga_per_jam" class="form-control"
                    value="{{ $lapangan->harga_per_jam }}">
            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status" class="form-control">
                    <option value="Tersedia" {{ $lapangan->status == 'Tersedia' ? 'selected' : '' }}>Tersedia</option>

                    <option value="Tidak Tersedia" {{ $lapangan->status == 'Tidak Tersedia' ? 'selected' : '' }}>Tidak Tersedia</option>
                </select>
            </div>

            <button class="btn btn-primary">
                Update
            </button>

            <a href="{{ route('lapangans.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection