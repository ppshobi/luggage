@extends('layouts.app')

@section('content')
<style>
#partners .card {
    width: 300px;
}
</style>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
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

    function initMap() {
        
        map = new google.maps.Map(document.getElementById('map'), {
            center: {lat: 12.9542944, lng: 77.5905106},
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
        var partners = '<div class="card-group">';
        $.get( "/api/facilities", function( data ) {
            $.each(data.features, function(k, v) {
                partners +=  '<div class="card" style="width: 300px;margin: 10px 10px 0 0px;">' +
                    '<div class="card-body">' +
                    '<h5 class="card-title">' + v.properties.name
                    + ' </h5> <p class="card-text"><strong class="font-weight-bold text-success">'
                    + v.properties.size + '</strong> of storage avaialble'
                    + '</p></div><div class="card-footer"><a href="javascript:void(0)" class="btn btn-primary">Book Now</a></div></div>';
            });
            partners += '</div>';
            $('#partners').html(partners);
        });
    }

</script>

@endsection
