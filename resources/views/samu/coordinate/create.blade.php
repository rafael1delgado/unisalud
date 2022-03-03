@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-globe"></i> Agregar Coordenadas</h3>

<form action="{{route('samu.mobile.store')}}" method="post" autocomplete="off">
    @csrf
    @method('POST')


    <div id="warning_msg"  class='alert alert-warning'></div>

    <div class="form-row">
        <fieldset class="form-group col-12 col-md-4">
            <label for="for_mobile_code">Nombre</label>
            <input type="text" class="form-control" id="for_name" name="name" value="" required>
        </fieldset>
        <fieldset class="form-group col-12 col-md-4">
            <label for="for_name_mobile_plate">Latitud </label>
            <input type="text" class="form-control" id="for_latitude" name="latitude" value="" required>
        </fieldset>
        <fieldset class="form-group col-12 col-md-4">
            <label for="for_name_mobile_type">Longitud </label>
            <input type="text" class="form-control" id="for_longitude" name="longitude" value="" required>
        </fieldset>
        <fieldset class="form-group col-12 col-md-4">
            <label for="for_name_mobile_code">Observación </label>
            <input type="textarea" class="form-control" id="for_observation" name="observation" value="" required>
        </fieldset>
    
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>

    <a href="{{ route('samu.coordinate.index') }}" class="btn btn-outline-secondary">Cancelar</a>
   
</form>
@endsection

@section('custom_js')
<script>

    window.onload = function() {

        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition, error);
        } else { 
            document.getElementById("warning_msg").innerHTML = "Este navegador no soporta geolocalización.";
        }

    };

    function showPosition(position) {
        document.getElementById("warning_msg").setAttribute("hidden");
        document.getElementById("for_latitude").value = position.coords.latitude;
        document.getElementById("for_longitude").value = position.coords.longitude;
    }

    function error(err) {
        document.getElementById("warning_msg").removeAttribute("hidden");
        document.getElementById("warning_msg").innerHTML = err.message;
    }
</script> 
@endsection