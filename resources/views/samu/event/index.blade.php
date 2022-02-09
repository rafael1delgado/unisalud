@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row">
    <div class="col-10">
        <table class="table table-sm ">
            <tr>
                <th>Orden salida</th>
                <th>Móvil</th>
                <th>Tripulación</th>
                <th>O2 central</th>
                <th>Colación</th>
            </tr>
            @foreach($shift->mobilesInService->sortBy('position') as $mis)
                <tr class="{{ ($mis->lunch_start_at AND !$mis->lunch_end_at) ? 'bg-secondary text-white' : '' }}">
                    <td>{{ $mis->position }}</td>
                    <td>{{ $mis->mobile->code }} {{ $mis->mobile->name }}</td>
                    <td>
                        @foreach($mis->crew as $tripulant)
                        {{ $tripulant->officialFullName }} <span class="badge bg-secondary text-white">{{ $tripulant->pivot->jobType->name }}</span>
                        @endforeach
                    </td>
                    <td>{{ $mis->o2 }}</td>
                    <td>
                        @if($mis->lunch_start_at AND !$mis->lunch_end_at)
                            {{ $mis->lunch_start_at->format('H:i')}} - 
                            {{ now()->diff($mis->lunch_start_at->copy()->addMinutes('45'))->format('%I') }}"
                        @elseif($mis->lunch_end_at)
                            {{ $mis->lunch_start_at->format('H:i')}} - 
                            {{ $mis->lunch_end_at->format('H:i')}} - 
                            {{ $mis->lunch_start_at->diff($mis->lunch_end_at)->format('%I') }}"
                        @endif
                    </td>
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

<h3 class="mb-3"><i class="fas fa-phone"></i> Llamadas sin cometido asociado</h3>
@include('samu.call.partials.list',['calls' => $calls])


<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de cometidos de hoy
    
    <a class="btn btn-success float-right" href="{{ route('samu.event.create') }}">
        <i class="fas fa-plus"></i> Crear cometido
    </a>

</h3>

@include('samu.event.partials.index', ['events' => $events_today])


<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de cometidos de ayer</h3>

@include('samu.event.partials.index', ['events' => $events_yesterday])


@endsection

@section('custom_js')

@endsection