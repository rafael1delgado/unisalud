@extends('fq.app')

@section('content')

<div class="jumbotron mt-3">
    <div class="container">
        <h1 class="display-4">Fibrosis Quística</h1>
        <div>
        <img src="{{ asset('images/fq.png') }}" class="img-thumbnail" 
        alt="Imagen de Fibrosis Quísitica">
        </div>
        
        <br> <br> 
        <p class="lead">Bienvenido al portal UNISALUD de apoyo a los paciente con Fibrosis Quística.<br>
            Compromiso adquirido con las familias por el director del Servicio de Salud de Iquique.<br></p>
            <h5><strong>Jorge Galleguillos Möller</strong></h5>
    </div>
</div>

@endsection
