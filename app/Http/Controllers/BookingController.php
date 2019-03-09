<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('booking.index')->with([
            'bookings' => Booking::all()
        ]);
    }

    public function verify(Request $request, $booking)
    {
        return view('booking.verify')->with([
            'booking' => Booking::find($booking)
        ]);
    }

    public function confirm(Request $request, $booking)
    {
        if (! $request->code) {
            \Session::flash('alert-danger', 'Code Invalid');
            return redirect()->back();
        }

        $code = $request->code;
        $customer_code = Booking::find($booking)->pluck('code')->first();

        if ($code == $customer_code) {
            $redeem = Booking::find($booking);
            $redeem->is_redeemed = 1;
            $redeem->save();

            \Session::flash('alert-success', 'Code Redeemed Successfully');
            return redirect('booking');
        }
        
        \Session::flash('alert-danger', 'Something Went Wrong! Try Again!');
        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        return view('booking.create')->with([
            'name'  => $request->name,
            'size'  => $request->size,
            'price' => $request->price,
            'lat'   => $request->lat,
            'lng'   => $request->lng,
        ]);
    }

    public function store(Request $request)
    {
        Booking::create([
            'user_id' => auth()->user()->id,
            'partner_id' => auth()->user()->id,
            'facility_name' => $request->name,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'price' => explode('/', $request->price)[0],
            'qty' => $request->qty,
            'size' => $request->size,
            'code' => rand(1000, 9999) . "-" . rand(1000, 9999) . "-" . rand(1000, 9999),
        ]);
        session()->flash('alert-success', "Booking confirmed");
        return redirect()->to(route('customer.dashboard'));
    }
}
