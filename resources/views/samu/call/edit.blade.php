@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-headset"></i> Datos de la llamada</h3>

<!-- Edit --> 
<form method="POST" action="{{ route('samu.call.update', $call) }}">
    @csrf
    @method('PUT')

    @include('samu.call.form', ['call' => $call, 'shiftUsers' => $shiftUsers])
</form>

<br>

@switch($call->classification)
    @case('OT')
        <div class="card">
            <div class="card-body">
            @include('samu.ot.edit', ['call' => $call])
            </div>
        </div>
        @break
    @case('T1')
    @case('T2')
    @case('NM')
        <div class="card">
            <div class="card-body">
            @include('samu.call.qtc', ['call' => $call, 'shift' => $shift])
            </div>
        </div>
        @break
    @default
        @break
@endswitch

<a href="{{ route('samu.call.index') }}" class="btn btn-outline-secondary mt-3">Volver</a>
<br>

@endsection

@section('custom_js')

@endsection