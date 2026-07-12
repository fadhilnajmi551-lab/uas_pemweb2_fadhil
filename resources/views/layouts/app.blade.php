<!DOCTYPE html>
<html lang="id">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Fadil Arena</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

<style>

*{
    font-family:'Poppins',sans-serif;
}

body{
    background:#f4f7fb;
}

.sidebar{

    position:fixed;

    left:0;

    top:0;

    width:260px;

    height:100vh;

    background:linear-gradient(180deg,#198754,#157347);

    color:white;

    box-shadow:0 0 20px rgba(0,0,0,.2);

}

.logo{

    text-align:center;

    padding:30px 20px;

    font-size:24px;

    font-weight:700;

}

.sidebar a{

    display:block;

    color:white;

    text-decoration:none;

    padding:15px 25px;

    transition:.3s;

    font-size:15px;

}

.sidebar a i{

    margin-right:10px;

}

.sidebar a:hover{

    background:rgba(255,255,255,.15);

    padding-left:35px;

}

.navbar-custom{

    margin-left:260px;

    background:white;

    height:70px;

    display:flex;

    justify-content:space-between;

    align-items:center;

    padding:0 30px;

    box-shadow:0 3px 10px rgba(0,0,0,.08);

}

.content{

    margin-left:260px;

    padding:30px;

}

.card{

    border:none;

    border-radius:18px;

    box-shadow:0 10px 25px rgba(0,0,0,.08);

}

.card:hover{

    transform:translateY(-5px);

    transition:.3s;

}

.btn{

    border-radius:10px;

}

.table{

    background:white;

    border-radius:15px;

    overflow:hidden;

}

</style>

</head>

<body>

<div class="sidebar">

<div class="logo">

⚽ Fadil Arena

</div>

<a href="/">

<i class="bi bi-speedometer2"></i>

Dashboard

</a>

<a href="{{ route('lapangans.index') }}">

<i class="bi bi-grid"></i>

Lapangan

</a>

<a href="{{ route('customers.index') }}">

<i class="bi bi-people"></i>

Customer

</a>

<a href="{{ route('bookings.index') }}">

<i class="bi bi-calendar-check"></i>

Booking

</a>

<a href="{{ route('pembayarans.index') }}">

<i class="bi bi-cash-coin"></i>

Pembayaran

</a>

</div>

<div class="navbar-custom">

<h4 class="mb-0">

Sistem Booking Lapangan Futsal

</h4>

<span>

👋 Selamat Datang, Admin

</span>

</div>

<div class="content">

@if(session('success'))

<div class="alert alert-success">

{{ session('success') }}

</div>

@endif

@yield('content')

</div>

</body>

</html>