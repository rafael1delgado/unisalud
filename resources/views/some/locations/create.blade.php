@extends('layouts.app')

@section('content')

<h3 class="mb-3">Nueva Locación</h3>

<form method="POST" class="form-horizontal" action="{{ route('some.locations.store') }}">
    @csrf
    @method('POST')

    <div class="row">
        <fieldset class="form-group col">
            <label for="for_description">Locaciones</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection