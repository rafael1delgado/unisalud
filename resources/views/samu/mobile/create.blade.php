@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Agregar Móvil</h3>

<form action="{{route('samu.mobile.store')}}" method="post" autocomplete="off">
    @csrf
    @method('POST')

    @include('samu.mobile.form', [
        'mobile' => null,
    ])

    <button type="submit" class="btn btn-primary">Crear</button>

    <a href="{{ route('samu.mobile.index') }}" class="btn btn-outline-secondary">Cancelar</a>
   
</form>
@endsection
