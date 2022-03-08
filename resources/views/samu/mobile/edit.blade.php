@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Editar Móvil</h3>

<form action="{{route('samu.mobile.update', $mobile)}}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')

    @include('samu.mobile.form', [
        'mobile' => $mobile,
    ])

    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ route('samu.mobile.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>
    





@endsection