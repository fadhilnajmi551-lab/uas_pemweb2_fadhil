@extends('layouts.app')

@section('content')
@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif
<div class="card">

    <div class="card-header bg-success text-white">
        <h4>Tambah Booking</h4>
    </div>

    <div class="card-body">

        <form action="{{ route('bookings.store') }}" method="POST">

            @csrf

            <div class="mb-3">
                <label class="form-label">Customer</label>

                <select name="customer_id" class="form-control" required>

                    <option value="">-- Pilih Customer --</option>

                    @foreach($customers as $customer)

                        <option value="{{ $customer->id }}">

                            {{ $customer->nama }}

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">Lapangan</label>

                <select
                    id="lapangan"
                    name="lapangan_id"
                    class="form-control"
                    required>

                    <option value="">-- Pilih Lapangan --</option>

                    @foreach($lapangans as $lapangan)

                        <option
                            value="{{ $lapangan->id }}"
                            data-harga="{{ $lapangan->harga_per_jam }}">

                            {{ $lapangan->nama_lapangan }}
                            - Rp {{ number_format($lapangan->harga_per_jam,0,',','.') }}/Jam

                        </option>

                    @endforeach

                </select>

            </div>

            <div class="mb-3">

                <label class="form-label">Tanggal Booking</label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control"
                    required>

            </div>

            <div class="row">

                <div class="col-md-6">

                    <label class="form-label">Jam Mulai</label>

                    <input
                        type="time"
                        id="jam_mulai"
                        name="jam_mulai"
                        class="form-control"
                        required>

                </div>

                <div class="col-md-6">

                    <label class="form-label">Jam Selesai</label>

                    <input
                        type="time"
                        id="jam_selesai"
                        name="jam_selesai"
                        class="form-control"
                        required>

                </div>

            </div>

            <div class="mt-3">

                <label class="form-label">Total Harga</label>

                <input
                    type="number"
                    id="total_harga"
                    name="total_harga"
                    class="form-control"
                    readonly>

            </div>

            <div class="mt-3">

                <label class="form-label">Status Booking</label>

                <select
                    name="status"
                    class="form-control">

                    <option value="Menunggu">Menunggu</option>
                    <option value="Dikonfirmasi">Dikonfirmasi</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Dibatalkan">Dibatalkan</option>

                </select>

            </div>

            <div class="mt-4">

                <button class="btn btn-success">

                    Simpan Booking

                </button>

                <a
                    href="{{ route('bookings.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

<script>

function hitungTotal() {

    let lapangan = document.getElementById("lapangan");

    if (lapangan.selectedIndex <= 0) {

        document.getElementById("total_harga").value = "";

        return;
    }

    let harga = parseInt(
        lapangan.options[lapangan.selectedIndex].dataset.harga
    );

    let mulai = document.getElementById("jam_mulai").value;

    let selesai = document.getElementById("jam_selesai").value;

    if (mulai !== "" && selesai !== "") {

        let jamMulai = parseInt(mulai.split(":")[0]);

        let jamSelesai = parseInt(selesai.split(":")[0]);

        let lama = jamSelesai - jamMulai;

        if (lama > 0) {

            document.getElementById("total_harga").value = lama * harga;

        } else {

            document.getElementById("total_harga").value = "";

        }

    }

}

document.getElementById("lapangan").addEventListener("change", hitungTotal);

document.getElementById("jam_mulai").addEventListener("change", hitungTotal);

document.getElementById("jam_selesai").addEventListener("change", hitungTotal);

</script>

@endsection