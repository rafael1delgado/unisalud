@extends('layouts.ssi')

@section('content')

<div class="jumbotron mt-3">
    <div class="container">
        <h class="display-4">Portal de Salud</h1>
        <p class="lead">Bienvenido al portal de salud de la región de Tarapacá.</p>
        <a class="btn btn-sm btn-outline-secondary" href="{{ route('profile.show') }}" >Mi Perfil</a>
    </div>
</div>

@endsection