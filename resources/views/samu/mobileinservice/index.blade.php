@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Móviles en servicio y tripulación
    <a class="btn btn-success float-right" href="{{ route('samu.mobileinservice.create') }}">
        <i class="fas fa-plus"></i> </i> Agregar móvil a turno
    </a>
</h3>
{{-- 
<td>
    <b>{{ $mis->shift->id }}</b> -
    {{ $mis->shift->opening_at->format('Y-m-d') }} - 
    {{ $mis->shift->type }} <br> ({{ $mis->shift->statusInWord }})
</td> 
--}}

<h4>Turno {{ $openShift->opening_at }} {{ $openShift->type }} ({{ $openShift->statusInWord }})</h4>
@include(
    'samu.mobileinservice.partials.list', 
    ['mobilesInService' => $openShift->mobilesInService->sortBy('position'), 'edit' => true, 'editLunch' => true]
)

@if($lastShift)
    <h4>Turno {{ $lastShift->opening_at }} {{ $lastShift->type }} ({{ $lastShift->statusInWord }})</h4>
    @include(
        'samu.mobileinservice.partials.list', 
        ['mobilesInService' => $lastShift->mobilesInService->sortBy('position'), 'edit' => false, 'editLunch' => false]
    )
@endif

@endsection

@section('custom_js')

@endsection
