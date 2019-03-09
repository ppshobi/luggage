@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Book now to secure your luggage</div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">Details of the selected facility</div>
                            <form action="{{ route('booking.store') }}" method="post">
                                @csrf
                                <input type="hidden" name="lat" value="{{ $lat }}">
                                <input type="hidden" name="lng" value="{{ $lng }}">
                                <div class="card-body">
                                <table class="table">
                                    <tbody>
                                    <tr>
                                        <th scope="row">Facility Name</th>
                                        <td>{{ $name }}</td>
                                        <input type="hidden" name="name" value="{{ $name }}">
                                    </tr>
                                    <tr>
                                        <th scope="row">Storage Capacity</th>
                                        <td>{{ $size }}/Unit</td>
                                        <input type="hidden" name="size" value="{{ $size }}">

                                    </tr>
                                    <tr>
                                        <th scope="row">Price</th>
                                        <td>{{ $price }}</td>
                                        <input type="hidden" name="price" value="{{ $price }}">

                                    </tr>
                                    <tr>
                                        <th scope="row">Quantity</th>
                                        <td>
                                            <select name="qty">
                                                <option>1</option>
                                                <option>2</option>
                                                <option>3</option>
                                                <option>4</option>
                                                <option>5</option>
                                                <option>6</option>
                                                <option>7</option>
                                                <option>8</option>
                                                <option>9</option>
                                                <option>10</option>
                                            </select>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                                <div class="card-footer">
                                    <button class="btn btn-primary" type="submit">Book Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
