@extends('layouts.app')

@section('content')

<h3 class="mb-3">Nueva autorización</h3>

<form method="POST" class="form-horizontal" action="{{ route('aps.minor_authorizations.store') }}">
    @csrf
    @method('POST')

    <div class="row">

        <fieldset class="form-group col-4">
            <label for="for_run">Run*</label>
            <input type="number" class="form-control" id="for_run" placeholder="" name="run" required>
        </fieldset>

        <fieldset class="form-group col-4">
            <label for="for_dv">DV*</label>
            <input type="text" class="form-control" id="for_dv" placeholder="" name="dv" required>
        </fieldset>

    </div>

    <div class="row">

        <fieldset class="form-group col">
            <label for="for_names">Nombres</label>
            <input type="text" class="form-control" id="for_names" placeholder="" name="names" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_fathers_family">Apellido paterno</label>
            <input type="text" class="form-control" id="for_fathers_family" placeholder="" name="fathers_family" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_mothers_family">Apellido materno</label>
            <input type="text" class="form-control" id="for_mothers_family" placeholder="" name="mothers_family" required>
        </fieldset>

    </div>

    <div class="row">

        <!-- <fieldset class="form-group col">
            <label for="for_authorization_date">Fecha de autorización</label>
            <input type="date" class="form-control" id="for_authorization_date" placeholder="" name="authorization_date" required>
        </fieldset> -->

        <fieldset class="form-group col-4">
            <label for="for_type_id">Tipo*</label>
            <select name="type_id" class="form-control" id="" @if($type_id!=0) disabled @endif>
                <option value=""></option>
                @foreach($authorizationTypes as $authorizationType)
                    <option value="{{$authorizationType->id}}" {{ $authorizationType->id == $type_id ? 'selected' : '' }}>{{$authorizationType->name}}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-4">
            <label for="for_authorized">Estado autorización*</label>
            <select name="authorized" class="form-control" id="">
                <option value=""></option>
                <option value="1">Autorizado</option>
                <option value="0">No autorizado</option>
            </select>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
