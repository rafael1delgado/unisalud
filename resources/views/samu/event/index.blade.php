@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row">
    <div class="col-10">
        <table class="table table-sm">
            <tr>
                <th>Orden salida</th>
                <th>Móvil</th>
                <th>Tripulación</th>
                <th>O2 central</th>
                <th>Estado</th>
            </tr>
            @foreach($shift->mobilesInService->sortBy('position') as $mis)
                <tr>
                    <td>{{ $mis->position }}</td>
                    <td>{{ $mis->mobile->code }} {{ $mis->mobile->name }}</td>
                    <td>
                        @foreach($mis->crew as $tripulant)
                        {{ $tripulant->officialFullName }} <span class="badge bg-secondary text-white">{{ $tripulant->pivot->jobType->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $mis->o2 }}</td>
                    <td>{{ $mis->status ? 'Activo' : 'Inactivo' }}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-2">
        <table class="table table-sm">
            <tr><th>Codificación colores</th></tr>
            <tr><td class="table-danger">Móvil aun no sale</td></tr>
            <tr><td class="table-warning">Móvil rumbo a destino</td></tr>
            <tr><td class="table-info">Móvil retornando a base</td></tr>
            <tr><td class="table-success">Móvil en base</td></tr>
        </table>
    </div>
</div>


<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de Eventos de hoy
    
    <a class="btn btn-success float-right" href="{{ route('samu.event.create') }}">
        <i class="fas fa-plus"></i> Crear Evento
    </a>

</h3>

@include('samu.event.partials.index', ['events' => $events_today])


<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de Eventos de ayer</h3>

@include('samu.event.partials.index', ['events' => $events_yesterday])


@endsection

@section('custom_js')

@endsection