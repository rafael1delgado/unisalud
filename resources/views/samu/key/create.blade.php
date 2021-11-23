@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-user-injured"></i> Crear Codificación de Clave</h3>

<form method="POST" action="{{ route('samu.key.store') }}">
    @csrf
    @method('POST')

    <div class="form-row">

        <fieldset class="form-group col-8 col-md-1">
            <label for="for_key">Código </label>
            <input type="text" class="form-control" id="for_key" name="key" autocomplete="off" required>
        </fieldset>

        <fieldset class="form-group col-8 col-md-4">
            <label for="for_name">Nombre </label>
            <input type="text" class="form-control" id="for_name" name="name" autocomplete="off" required>
        </fieldset>
    
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ route('samu.key.index') }}" class="btn btn-outline-secondary">Cancelar</a>
            
</form>

@endsection
