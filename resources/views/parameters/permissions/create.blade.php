@extends('layouts.app')

@section('title', 'Crear nuevo permiso')

@section('content')

<h3 class="mb-3">Crear nuevo permiso</h3>

<form method="POST" class="form-horizontal" action="{{ route('parameter.permission.store') }}">
    @csrf
    @method('POST')

    <div class="form-row">

        <fieldset class="form-group col-12">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" id="for_name"
                placeholder="nombre del permiso" name="name" required>
        </fieldset>

        <fieldset class="form-group col-12">
            <label for="for_description">Descripción</label>
            <input type="text" class="form-control" id="for_description"
                placeholder="Descripción del permiso" name="description">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
