@extends('layouts.mail')

@section('content')

<div style="text-align: justify;">

    <h4>Estimado/a Delegado de Epidemiología: </h4>

    <br>

    <p>De acuerdo al Decreto 7 Articulo 1 inciso a) del Ministerio de Salud/Subsecretaría de Salud Pública que aprueba el reglamiento sobre notificación de enfermedades transmisibles de declaración obligatoria y vigilancia</p>

    <p>Se informa que la Muestra:</p>

    <ul>
        <li><strong>ID:</strong>: {{ $suspectCase->id }}</li>
        <li><strong>De Tipo:</strong>: {{ $suspectCase->type }}</li>
    </ul>


    <p>Del Paciente:</p>

    <ul>
        <li><strong>RUN/Identificación</strong>:
            @if($suspectCase->patient->identifierRun)
            {{$suspectCase->patient->identifierRun->value ??''}}-{{$suspectCase->patient->identifierRun->dv}}
            @else
            {{ $suspectCase->patient->Identification->value ??''}}
            @endif
        </li>
        <li><strong>Nombre</strong>: {{$suspectCase->patient->OfficialFullName ??''}}</li>
        <li><strong>Edad</strong>: {{\Carbon\Carbon::parse($suspectCase->patient->birthday)->age}}</li>
        <li><strong>Sexo</strong>: {{$suspectCase->patient->actualSex()->text ??''}}</li>
        <li><strong>Nacionalidad</strong>: {{$suspectCase->patient->nationality->name ??''}}</li>
        
    </ul>


    <p>Se encuentra <b>EN PROCESO</b> </p>

</div>
@endsection