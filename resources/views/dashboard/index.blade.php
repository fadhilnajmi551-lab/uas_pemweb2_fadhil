@extends('layouts.app')

@section('content')

<h2 class="mb-4">

Dashboard

</h2>

<div class="row">

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>Total Lapangan</h5>
<h2>{{ $totalLapangan }}</h2>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>Total Customer</h5>
<h2>{{ $totalCustomer }}</h2>

</div>

</div>

</div>

<div class="col-md-4">

<div class="card">

<div class="card-body">

<h5>Total Booking</h5>
<h2>{{ $totalBooking }}</h2>

</div>

</div>

</div>

</div>

@endsection