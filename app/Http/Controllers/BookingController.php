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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create(Request $request)
    {
        return view('booking.create')->with([
            'name' => $request->name,
            'size' => $request->size,
            'price' => $request->price,
        ]);
    }

    public function store(Request $request)
    {

        Booking::create([
            'id' => $request->id,
            'user_id' => auth()->user()->id,
            'partner_id' => auth()->user()->id,
            'facility_name' => $request->facility_name,
            'lat' => $request->lat,
            'lng' => $request->lng,
            'price' => $request->price,
            'qty' => $request->qty,
            'size' => $request->size,
            'code' => $request->code,
        ]);
        dd($request->all());
    }
}
