<?php

namespace App\Http\Controllers;

use App\Models\Lapangan;
use App\Models\Customer;
use App\Models\Booking;

class DashboardController extends Controller
{
    public function index()
    {
        $totalLapangan = Lapangan::count();
        $totalCustomer = Customer::count();
        $totalBooking = Booking::count();

        return view('dashboard.index', compact(
            'totalLapangan',
            'totalCustomer',
            'totalBooking'
        ));
    }
}