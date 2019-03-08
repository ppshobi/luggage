@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Partner Dashboard</div>
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
                                        Quantity: <input type="number" class="form-control col-md-2" name="qty" value="1" >
                                        @if ($errors->has('name'))
                                            <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                        @endif
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
                                        <input id="latitude" type="latitude" placeholder="latitude" class="form-control{{ $errors->has('latitude') ? ' is-invalid' : '' }}" name="latitude" value="{{ old('latitude') }}" required autofocus>
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

                                <div class="form-group row mb-0">
                                    <div class="col-md-8 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
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
