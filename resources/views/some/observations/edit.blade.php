@extends('layouts.app')

@section('content')

<h3 class="mb-3">Editar Localización</h3>

<form method="POST" class="form-horizontal" action="{{ route('some.observations.update', $observation) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <fieldset class="form-group col">
        <label for="for_description">Descripción</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required value="{{$observation->description}}">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@canany(['administrador'])
    <br /><hr />
    <div style="height: 300px; overflow-y: scroll;">
        @include('partials.audit', ['audits' => $observation->audits] )
    </div>
@endcanany

@endsection

@section('custom_js')

@endsection