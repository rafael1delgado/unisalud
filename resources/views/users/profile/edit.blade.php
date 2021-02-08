@extends('layouts.ssi')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mis datos personales</h1>
</div>

<form method="POST" class="form-horizontal" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="form-row">
        <fieldset class="form-group col-6 col-md-3">
            <label for="for_id_type">Tipo de identificación</label>
            <select name="id_type" id="for_id_type" class="form-control" disabled>
                <option value="PN" selected >RUN</option>
                <option value="PPN">Pasaporte</option>
                <option value="MR">N° ficha</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-6 col-md-2">
            <label for="for_identifier">Identificador</label>
            <input type="text" class="form-control" name="identifier"
                id="for_identifier" value="{{ auth()->id() }}" disabled>
        </fieldset>

    </div>

    <div class="form-row">

        <fieldset class="form-group col-12 col-md-4">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" name="name"
                id="for_name" required value="{{ implode(' ',$user['name'][0]['given']) }}">
        </fieldset>


        <fieldset class="form-group col-12 col-md-3">
            <label for="for_fathers_family">Apellido Paterno</label>
            <input type="text" class="form-control" name="fathers_family"
                id="for_fathers_family" required value=
                "{{ $user['name'][0]['_family']['extension'][0]['valueString'] }}">
        </fieldset>

        <fieldset class="form-group col-12 col-md-3">
            <label for="for_mothers_family">Apellido Materno</label>
            <input type="text" class="form-control" name="mothers_family"
                id="for_mothers_family" required value=
                "{{ $user['name'][0]['_family']['extension'][1]['valueString'] }}">
        </fieldset>

    </div>



    <button type="submit" class="btn btn-primary">Actualizar</button>

</form>
@endsection
