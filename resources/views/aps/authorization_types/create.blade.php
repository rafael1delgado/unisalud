@extends('layouts.app')

@section('content')

<h3 class="mb-3">Nuevo tipo de autorización</h3>

<form method="POST" class="form-horizontal" action="{{ route('aps.authorization_types.store') }}">
    @csrf
    @method('POST')

    <div class="row">
        <fieldset class="form-group col">
            <label for="for_name">Nombre*</label>
            <input type="text" class="form-control" id="for_name" placeholder="" name="name" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_start_date">Desde*</label>
            <input type="date" class="form-control" id="for_start_date" placeholder="" name="start_date" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_end_date">Hasta*</label>
            <input type="date" class="form-control" id="for_end_date" placeholder="" name="end_date" required>
        </fieldset>

        <fieldset class="form-group col">
            <label for="for_name">Estado*</label>
            <select name="status" class="form-control" id="">
                <option value="1">Activo</option>
                <option value="0">Inactivo</option>
            </select>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
