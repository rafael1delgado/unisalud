@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-user-injured"></i> Editar Codificación de Clave</h3>

<form method="post" action="{{ route('samu.key.update', $key) }}">
    @csrf
    @method('PUT')

    @include('samu.key.form', [
        'key' => $key,
    ])

    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ route('samu.key.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>

@endsection