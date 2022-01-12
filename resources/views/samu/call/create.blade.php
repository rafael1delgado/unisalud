@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-headset"></i> Nueva de Llamada
    <small class="float-right"><i class="far fa-calendar-alt"></i> Fecha de registro: {{ date('Y-m-d') }}</small>
</h3>

<!-- Create--> 
<form method="POST" action="{{ route('samu.call.store') }}">
    @csrf
    @method('POST')

    @include('samu.call.form', ['call' => null])

    <button type="submit" class="btn btn-primary" >Guardar</button>

    <a href="{{ route('samu.call.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>

@endsection

@section('custom_js')

@endsection