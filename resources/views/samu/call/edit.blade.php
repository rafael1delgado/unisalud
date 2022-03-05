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

<h3 class="mb-3"><i class="fas fa-clipboard-check"></i> Datos de la llamada ID: {{ $call->id }}</h3>

<!-- Edit --> 
<form method="POST" action="{{ route('samu.call.update', $call) }}">
    @csrf
    @method('PUT')

    @include('samu.call.form', ['call' => $call])

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
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script src="{{ asset('/js/samu/call-form.js') }}"></script>
@endsection
