@extends('layouts.app')

@section('content')

<div class="card">
    <div class="card-header">
        <h3>Tambah Lapangan</h3>
    </div>

    <div class="card-body">

        <form action="{{ route('lapangans.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label>Nama Lapangan</label>
                <input type="text" name="nama_lapangan" class="form-control">
            </div>

            <div class="mb-3">
                <label>Jenis Lapangan</label>

                <select name="jenis_lapangan" class="form-control">

                    <option value="">Pilih</option>
                    <option>Sintetis</option>
                    <option>Vinyl</option>
                    <option>Rumput</option>

                </select>
            </div>

            <div class="mb-3">
                <label>Harga per Jam</label>
                <input type="number" name="harga_per_jam" class="form-control">
            </div>

            <div class="mb-3">
                <label>Status</label>

                <select name="status" class="form-control">

                    <option>Tersedia</option>
                    <option>Tidak Tersedia</option>

                </select>
            </div>

            <button class="btn btn-success">
                Simpan
            </button>

            <a href="{{ route('lapangans.index') }}" class="btn btn-secondary">
                Kembali
            </a>

        </form>

    </div>

</div>

@endsection