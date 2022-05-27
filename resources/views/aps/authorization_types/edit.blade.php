@extends('layouts.app')

@section('content')

<h3 class="mb-3">Editar tipo de autorización</h3>

<form method="POST" class="form-horizontal" action="{{ route('aps.authorization_types.update', $authorizationType) }}">
    @csrf
    @method('PUT')

    <div class="row">
        <fieldset class="form-group col">
            <label for="for_name">Nombre*</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" value="{{$authorizationType->name}}" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_start_date">Desde*</label>
            <input type="date" class="form-control" id="for_start_date" placeholder="" name="start_date" value="{{$authorizationType->start_date->format('Y-m-d') }}" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_end_date">Hasta*</label>
            <input type="date" class="form-control" id="for_end_date" placeholder="" name="end_date" value="{{$authorizationType->end_date->format('Y-m-d') }}" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_name">Estado*</label>
            <select name="status" class="form-control" id="">
                <option value="1" {{ $authorizationType->status == 1 ? 'selected' : '' }}>Activo</option>
                <option value="0" {{ $authorizationType->status == 0 ? 'selected' : '' }}>Inactivo</option>
            </select>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@canany(['administrador'])
    <br /><hr />
    <div style="height: 300px; overflow-y: scroll;">
        @include('partials.audit', ['audits' => $authorizationType->audits] )
    </div>
@endcan

@endsection

@section('custom_js')

@endsection
