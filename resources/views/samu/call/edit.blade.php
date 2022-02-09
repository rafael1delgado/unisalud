@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-clipboard-check"></i> Datos de la llamada</h3>

<!-- Edit --> 
<form method="POST" action="{{ route('samu.call.update', $call) }}">
    @csrf
    @method('PUT')

    @include('samu.call.form', ['call' => $call])

    <button type="submit" class="btn btn-primary" >Guardar</button>

    <a href="{{ route('samu.call.index') }}" class="btn btn-outline-secondary">Cancelar</a>
</form>

<br>

@if($call->associatedCalls->isNotEmpty())
    <h4 class="mb-3"><i class="fas fa-phone"></i> Llamadas asociadas</h4>
    @include('samu.call.partials.list',['calls' => $call->associatedCalls, 'edit'=>true])
@else
    <h4 class="mb-3"><i class="fas fa-phone"></i> Asociar a llamada</h4>
    @livewire('samu.associated-calls',['shift' => $shift, 'currentCall' => $call])
@endif

@switch($call->classification)
    @case('T1')
    @case('T2')
    @case('NM')
        <div class="card">
            <div class="card-body">
            @include('samu.call.event', ['call' => $call, 'shift' => $shift])
            </div>
        </div>
        @break
    @default
        @break
@endswitch


@endsection

@section('custom_js')

@endsection