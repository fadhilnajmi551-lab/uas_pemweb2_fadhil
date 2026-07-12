@extends('layouts.app')

@section('content')

<h2 class="mb-3">Pembayaran Booking</h2>

@if(session('error'))
<div class="alert alert-danger">
    {{ session('error') }}
</div>
@endif

<form action="{{ route('pembayarans.store') }}" method="POST">

@csrf

<div class="mb-3">

<label>Booking</label>

<select
id="booking"
name="booking_id"
class="form-control"
required>

<option value="">-- Pilih Booking --</option>

@foreach($bookings as $booking)

<option
value="{{ $booking->id }}"
data-total="{{ $booking->total_harga }}">

{{ $booking->customer->nama }}
-
{{ $booking->lapangan->nama_lapangan }}
-
{{ $booking->tanggal }}
({{ $booking->jam_mulai }} - {{ $booking->jam_selesai }})

</option>

@endforeach

</select>

</div>

<div class="mb-3">

<label>Tanggal Bayar</label>

<input
type="date"
name="tanggal_bayar"
class="form-control"
value="{{ date('Y-m-d') }}">

</div>

<div class="mb-3">

<label>Metode Pembayaran</label>

<select
name="metode_bayar"
class="form-control">

<option value="Cash">Cash</option>
<option value="Transfer">Transfer</option>
<option value="QRIS">QRIS</option>

</select>

</div>

<div class="mb-3">

<label>Total Bayar</label>

<input
id="total"
type="number"
name="total_bayar"
class="form-control"
readonly>

</div>

<div class="mb-3">

<label>Uang Dibayar</label>

<input
id="dibayar"
type="number"
name="uang_dibayar"
class="form-control"
required>

</div>

<div class="mb-3">

<label>Kembalian</label>

<input
id="kembalian"
type="number"
class="form-control"
readonly>

</div>

<button class="btn btn-success">

Simpan Pembayaran

</button>

<a
href="{{ route('pembayarans.index') }}"
class="btn btn-secondary">

Kembali

</a>

</form>

<script>

let booking=document.getElementById('booking');

let total=document.getElementById('total');

let dibayar=document.getElementById('dibayar');

let kembalian=document.getElementById('kembalian');

booking.addEventListener('change',function(){

let harga=this.options[this.selectedIndex].dataset.total;

total.value=harga;

kembalian.value="";

dibayar.value="";

});

dibayar.addEventListener('keyup',function(){

let kembali=this.value-total.value;

if(kembali<0){

kembalian.value=0;

}else{

kembalian.value=kembali;

}

});

</script>

@endsection