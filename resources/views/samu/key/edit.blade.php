@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-user-injured"></i> Editar Codificación de Clave</h3>

<form method="post" action="{{ route('samu.key.update', $key) }}">
    @csrf
    @method('PUT')

    <div class="form-row">

        <fieldset class="form-group col-8 col-md-1">
            <label for="for_key">Código </label> 
            <input type="text" class="form-control" id="for_key" name="key" value="{{ $key->key }}" autocomplete="off" required>
        </fieldset>

        <fieldset class="form-group col-8 col-md-4">
            <label for="for_name">Nombre </label>
            <input type="text" class="form-control" id="for_name" name="name" value="{{ $key->name }}" autocomplete="off" required>
        </fieldset>
    
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ route('samu.key.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>

@endsection