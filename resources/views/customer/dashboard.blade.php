@extends('layouts.app')

@section('content')
<style>
#partners {
    overflow: scroll;
    height: 400px;;
}
.grid-item { width: 200px; }
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div id="partners" style="height:400px; overflow:scroll;">

                </div>
            </div>
            <div class="col-md-8">
                <div class="card">

                    <div class="card-body" style="padding:0px;">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div id="map" style="height:400px;"></div>

                    </div>
                </div>
                
                <div id="partners">

                </div>
                <h3 class="card-title pt-2">Book from our certified partners</h3>

            </div>
        </div>
    </div>
@endsection

@section('scripts')

<script defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3WcCHGnzBaFFLEtTsi4D2C7hLS26oaaY&callback=initMap"></script>


<script>

var cords = [];
    cords['lan'] = 12.9542944;
    cords['lon'] = 77.5905106;

    window.onload = function() {
        var geoSuccess = function(position) {
            cords['lan'] = position.coords.latitude;
            cords['lon'] = position.coords.longitude;
        };
        navigator.geolocation.getCurrentPosition(geoSuccess);
    };


    function initMap() {
        
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: cords['lan'], lng: cords['lon']},
            zoom: 13
        });

        map.data.loadGeoJson('/api/facilities');

        let infoWindow = new google.maps.InfoWindow({
            pixelOffset: new google.maps.Size(0, -30)
        });

        map.data.addListener('click', function (event) {
            infoWindow.setContent(event.feature.getProperty('name') + ',<br>' +  event.feature.getProperty('price') + ',<br><br>' + event.feature.getProperty('button') );
            infoWindow.setPosition(event.latLng);
            infoWindow.open(map);
        });

        getLocations();
    }

    function getLocations() {
        $.get( "/api/facilities", function( data ) {
            generateCards(data.features);
        });
    }

    function generateCards(partners) {
        var html = '';
        $.each(partners, function(k, v) {
            html +=  '<div class="card" style="margin-bottom:10px;"><div class="card-body"><h5 class="card-title">' + v.properties.name + ' </h5> <p class="card-text"><strong>' + v.properties.size + '</strong></p><a href="javascript:void(0)" class="btn btn-primary">Book Now</a></div></div>';
        });

        $('#partners').html(html);
    }

</script>

@endsection
