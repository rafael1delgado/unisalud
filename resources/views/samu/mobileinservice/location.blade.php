@extends('layouts.app')

@section('content')

@include('samu.nav')

<style>
    /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
#map {
  height: 100%;
}

/* Optional: Makes the sample page fill the window. */
html,
body {
  height: 100%;
  margin: 0;
  padding: 0;
}
</style>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

<h3 class="mb-3">
    <i class="fas fa-map-marked"></i> Ubicación del móvil
</h3>

<div class="form-row mb-3">
    
    <div class="col-3">
        <label for="latitude" class="form-label">Latitud</label>
        <input type="text" class="form-control" id="latitude">
    </div>
    
    <div class="col-3">
        <label for="longitude" class="form-label">Longitud</label>
        <input type="text" class="form-control" id="longitude">
    </div>
    
    <button class="btn btn-primary" onclick="getLocation()">Obtener ubicación</button>
</div>

<div id="map"></div>

@endsection

@section('custom_js')
<script>
    
    var lat = document.getElementById("latitude");
    var lon = document.getElementById("longitude");
    
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else { 
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    
    function showPosition(position) {
        lat.value = position.coords.latitude;
        lon.value = position.coords.longitude;
    }
    
    function initMap() {
        const myLatLng = { lat: -20.244520315752016, lng: -70.13443840906216 };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 4,
            center: myLatLng,
        });

        new google.maps.Marker({
            position: myLatLng,
            map,
            title: "Hello World!",
        });
    }
</script>

<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<script
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB41DRUbKWJHPxaFjMAwdrzWzbVKartNGg&callback=initMap&v=weekly&channel=2"
    async
>
@endsection
