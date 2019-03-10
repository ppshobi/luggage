<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Booking;
use Auth;

class CustomerDashboardController extends Controller
{
    public function index()
    {
        return view('customer.dashboard');
    }

    public function getLocation()
    {
        $data = 'test';
        return response($data);
    }

    public function vouchers()
    {
        $booking = Booking::where('user_id', Auth::user()->id)->get();
        return view('customer.voucher')->with([
            'bookings' => $booking
        ]);
    }
}
