@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header"><a href="/partner/dashboard">Partner Dashboard</a> | <a href="/booking">Recent Bookings</a> </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">Facilities you own</div>

                            <div class="card-body">
                                <ul>
                                    @foreach($storages as $storage)
                                        <li>{{ $storage->name }} x {{ $storage->qty }}- {{ $storage->price }}/hr</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="card">
                            <div class="card-header">Add storage facility</div>
                            <form action="{{ route('storage.store') }}" method="post" class="form pt-2">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Facility Name</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" placeholder="Storage Locker/Parking" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required autofocus>
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="fomr-group row">
                                    <label for="qty" class="col-md-4 col-form-label text-md-right">Quantity</label>
                                    <div class="col-md-6 mb-3">
                                        <input type="number" class="form-control col-md-2" name="qty" value="1" >
                                    </div>
                                </div> 
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Size/Area</label>

                                    <div class="col-md-6">
                                        <input id="size" type="size" placeholder="20kg / 5ft x 5ft" class="form-control{{ $errors->has('size') ? ' is-invalid' : '' }}" name="size" value="{{ old('size') }}" required autofocus>
                                        @if ($errors->has('size'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('size') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="price" class="col-md-4 col-form-label text-md-right">Price/Hour</label>

                                    <div class="col-md-6">
                                        <input id="price" type="price" placeholder="&#8377; 100" class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" name="price" value="{{ old('price') }}" required autofocus>
                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('price') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="location" class="col-md-4 col-form-label text-md-right">Location</label>

                                    <div class="col-md-6">
                                        <input id="latitude" type="latitude" placeholder="latitude" class="mb-3 form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude') }}" required autofocus>
                                        @if ($errors->has('latitude'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('latitude') }}</strong>
                                        </span>
                                        @endif
                                        
                                        <input id="longitude" type="longitude" placeholder="longitude" class="form-control{{ $errors->has('longitude') ? ' is-invalid' : '' }}" name="longitude" value="{{ old('longitude') }}" required autofocus>
                                        @if ($errors->has('longitude'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('longitude') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div id="map" class="col-md-8" class="mb-4" style="height:300px;margin:auto;"></div>
                                <br>

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary mb-3">
                                            Save Storage
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('scripts')
<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3WcCHGnzBaFFLEtTsi4D2C7hLS26oaaY&callback=initMap&libraries=places"></script>
<script>

    function initMap() {
        
        var map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 12.9174555, lng: 77.6469113},
            zoom: 12
        });

        var marker = new google.maps.Marker({
            position: {lat: 12.9174555, lng: 77.6469113},
            map: map,
            title: 'Hello World!',
            draggable: true
        });

        google.maps.event.addListener(marker, 'dragend', function (event) {
            document.getElementById("latitude").value = this.getPosition().lat();
            document.getElementById("longitude").value = this.getPosition().lng();
        });

    }

</script>

@endsection