@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Móviles en servicio y tripulación
    <a class="btn btn-success float-right" href="{{ route('samu.mobileinservice.create') }}">
        <i class="fas fa-plus"></i> </i> Agregar móvil a turno
    </a>
</h3>

<pre>
@foreach($locations as $location)
    <li>{{ print_r($location->toArray()) }}</li>
@endforeach
</pre>

@endsection

@section('custom_js')

@endsection
