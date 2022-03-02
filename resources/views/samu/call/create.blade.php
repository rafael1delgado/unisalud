@extends('layouts.app')

@section('custom_js_head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

<style>
    #map { 
    width: 100%;
    height: 580px;
}
</style>
@endsection

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-headset"></i> Nueva de Llamada
    <small class="float-right"><i class="far fa-calendar-alt"></i> Fecha de registro: {{ date('Y-m-d') }}</small>
</h3>

<!-- Create--> 
<form method="POST" action="{{ route('samu.call.store') }}">
    @csrf
    @method('POST')

    @include('samu.call.form', ['call' => null])

    <button type="submit" class="btn btn-primary" >Guardar</button>

    <a href="{{ route('samu.call.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>

<div class="my-3">
    <div id="map"></div>
</div>
 
@endsection

@section('custom_js')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script>
    const LATITUDE = -20.249956245793552;
    const LONGITUDE = -70.12817358465354;
    
    let mapOptions = {
        center: [LATITUDE, LONGITUDE],
        zoom: 17
    }

    let map = new L.map('map' , mapOptions);
    let layer = new L.TileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png');
    map.addLayer(layer);

    let marker = new L.Marker([LATITUDE, LONGITUDE], { 
        draggable: true,
    }).addTo(map);

    marker.on('drag', (e) => {
        var marker = e.target;
        var latLang = marker.getLatLng();
    
        let setLatitude = latLang.lat;
        let setLongitude = latLang.lng;
        
        let inputLatitude = document.getElementById("latitude");
        let inputLongitude = document.getElementById("longitude");

        inputLatitude.setAttribute('value', setLatitude.toFixed(8));
        inputLongitude.setAttribute('value', setLongitude.toFixed(8));

        marker.setLatLng(latLang);
    });
</script>
@endsection