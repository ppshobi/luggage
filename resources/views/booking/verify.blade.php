@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-left">
            <div class="col-md-10">
                <a href="/partner/dashboard" class="mr-3">Partner Dashboard</a> |
                <a href="/booking" class="ml-3">Recent Bookings</a> 
            </div>
        </div>
        <br>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Booking Details</div>

                    <div class="card-body">
                        <table class="table">
                            <tr><td> Booking </td><td>#000{{ $booking->id }}</td></tr>
                            <tr><td> Booking </td><td>{{ $booking->customer->name }}</td></tr>
                            <tr><td> Booking </td><td>{{ $booking->facility_name }}</td></tr>
                            <tr><td> Booking </td><td>{{ $booking->qty }}</td></tr>
                            <tr><td> Booking </td><td>{{ $booking->price }}</td></tr>
                            <tr><td> Booking </td><td>&#8377; {{ $booking->price * $booking->qty }}</td></tr>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">Verify Code</div>
                    <div class="card-body">
                        <form method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="exampleInputEmail1">Enter Code</label>
                                <input required type="text" name="code" class="form-control" id="" aria-describedby="emailHelp" placeholder="Enter Voucher Code">
                                <small id="emailHelp" class="form-text text-muted">Get code from booked customer</small>
                            </div>
                            <button type="submit" class="btn btn-primary">Verify</button>
                        </form>
                    </div>

                </div>
            </div>
            
        </div>
    </div>
@endsection
