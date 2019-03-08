@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Customer Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        Find secure places to keep your stuff

                        {{-- <div style="width: 100%; height: 500px;">
                            {!! Mapper::render() !!}
                        </div> --}}

                        <div id="map" style="height:300px;"></div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3WcCHGnzBaFFLEtTsi4D2C7hLS26oaaY&callback=initMap"></script>

<script>

    function initMap() {
        
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 12.9542944, lng: 77.5905106},
            zoom: 13
        });

        map.data.loadGeoJson('/api/facilities');

        // map.data.setStyle(function (feature) {
        //         let iconBase = "https://maps.google.com/mapfiles/ms/icons/";
        //         return {
        //             icon: feature.getProperty('gender') == "Female" ? iconBase + 'pink-dot.png' : iconBase + 'blue-dot.png'
        //         };
        //     }
        // );

        let infoWindow = new google.maps.InfoWindow({
            pixelOffset: new google.maps.Size(0, -30)
        });

        map.data.addListener('click', function (event) {
            infoWindow.setContent(event.feature.getProperty('name') + '<br>' +  event.feature.getProperty('price') );
            infoWindow.setPosition(event.latLng);
            infoWindow.open(map);
        });

        // map.data.loadGeoJson(url);
    }

    function getLocations() {
        $.post( "api/getLocation", function( data ) {
            alert(data);
        });
    }

</script>

@endsection
