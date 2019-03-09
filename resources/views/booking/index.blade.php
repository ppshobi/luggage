@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="/partner/dashboard">Partner Dashboard</a> | <a href="/booking">Recent Bookings</a> </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">Bookings</div>

                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Booking Id</th>
                                            <th>Booked by</th>
                                            <th>Booked item</th>
                                            <th>Booked Quantity</th>
                                            <th>Price/Unit</th>
                                            <th>Total booking value</th>
                                            <th>Actions</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($bookings as $booking)
                                        <tr>
                                            <td>#000{{ $booking->id }}</td>
                                            <td>{{ $booking->customer->name }}</td>
                                            <td>{{ $booking->facility_name }}</td>
                                            <td>{{ $booking->qty }}</td>
                                            <td>{{ $booking->price }}</td>
                                            <td>&#8377; {{ $booking->price * $booking->qty }}</td>
                                            <td> 
                                                @if ($booking->is_redeemed)
                                                    <span style="background: #ddd;"> Redeemed </span>
                                                @else
                                                    <a href="/booking/{{$booking->id}}/verify" class="btn btn-sm btn-success">Verify Code</a> 
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
