@extends('layouts.app')

@section('custom_js_head')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />

<style>
    #map {
        width: 100%;
        height: 400px;
    }
</style>
@endsection

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-headset"></i> Nueva llamada
    <small class="float-right"><i class="far fa-calendar-alt"></i> Fecha de registro: {{ date('Y-m-d') }}</small>
</h3>

<!-- Create-->
<form method="POST" action="{{ route('samu.call.store') }}">
    @csrf
    @method('POST')

    <div id="danger-msg"  class='alert alert-danger' style="display:none"></div>
    <div id="success-msg"  class='alert alert-success' style="display:none"></div>

    @include('samu.call.form', ['call' => null])

</form>

@endsection

@section('custom_js')
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('/js/samu/call-form.js') }}"></script>
<script>
    const URL_GEOCODE = 'https://geocode.search.hereapi.com/v1/geocode';
    const API_KEY = '{{ env("API_KEY_HERE") }}';
    const ZOOM_SEARCH = 15;
    let btnSearch = document.getElementById('btn-search');

    function showError(msg) {
        hiddenSuccess();
        document.getElementById("danger-msg").innerHTML = msg;
        document.getElementById("danger-msg").style.display = 'block';
    }

    function showSuccess(msg) {
        hiddenError();
        document.getElementById("success-msg").innerHTML = msg;
        document.getElementById("success-msg").style.display = 'block';
    }

    function hiddenError() {
        document.getElementById("danger-msg").style.display = 'none';
    }

    function hiddenSuccess() {
        document.getElementById("success-msg").style.display = 'none';
    }

    btnSearch.addEventListener('click', (event) => {
        let address = document.getElementById('for-address');
        let commune = document.getElementById('for-commune');
        let country = 'chile';
        commune = (commune.value != '') ? commune.options[commune.selectedIndex].text : '';

        if(address.value != '') {
            getLocation(address.value, commune, country);
        } else {
            showError('El campo dirección es obligatorio para autoposicionar el pin en el mapa.');
        }
    });

    async function getLocation(address, commune, country) {
        try {
            const params = {
                q: `${address} ${commune} ${country}`,
                apiKey: API_KEY
            };
            const response = await axios.get(`${URL_GEOCODE}`, { params });
            let locations = response.data.items;

            if(locations.length != 0) {
                let location = locations[0].position;
                marker.setLatLng([location.lat, location.lng]);
                map.setView([location.lat, location.lng], ZOOM_SEARCH);
                inputLatitude.setAttribute('value', location.lat);
                inputLongitude.setAttribute('value', location.lng);
                showSuccess('El pin fue autoposicionado.');
            } else {
                showError('La dirección indicada no fue encontrada.');
            }
        } catch (error) {
            showError('Disculpe, en este momento no podemos buscar la dirección indicada.');
        }
    }
</script>
@endsection
