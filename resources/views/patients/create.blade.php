@extends('layouts.ssi')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Crear nuevo paciente FHIR</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
        </div>
    </div>
</div>

<form method="POST" class="form-horizontal" action="{{ route('patient.store') }}">
    @csrf
    @method('PUT')

    <div class="form-row">
        <fieldset class="form-group col-2">
            <label for="for_id_type">Tipo de identificación</label>
            <select name="id_type" id="for_id_type" class="form-control">
                <option value="RUN">RUN</option>
                <option value="Passport">Passport</option>
                <option value="Passport">N° ficha</option>
                <option value="Passport">Acta nacimiento</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_indentifier">Identificador</label>
            <input type="text" class="form-control" name="indentifier"
                id="for_indentifier" required placeholder="">
        </fieldset>

    </div>

    <div class="form-row">

        <fieldset class="form-group col-2">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" name="name"
                id="for_name" required placeholder="">
        </fieldset>


        <fieldset class="form-group col-2">
            <label for="for_fathers_family">Apellido Paterno</label>
            <input type="text" class="form-control" name="fathers_family"
                id="for_fathers_family" required placeholder="">
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_mothers_family">Apellido Materno</label>
            <input type="text" class="form-control" name="mothers_family"
                id="for_mothers_family" required placeholder="">
        </fieldset>

    </div>

    <div class="form-row">
        <fieldset class="form-group col-2">
            <label for="for_birthdate">Fecha de nacimiento</label>
            <input type="date" class="form-control" name="birthdate"
                id="for_birthdate" required placeholder="">
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_gender">Sexo</label>
            <select name="gender" id="for_gender" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="unknown">Unknown</option>
                <option value="other">Other</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_gender_identity">Identidad de Genero</label>
            <select name="gender" id="for_gender_identity" class="form-control">
                <option value="male">Male</option>
                <option value="female">Female</option>
                <option value="unknown">Unknown</option>
                <option value="other">Other</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_birth_place">País de nacimeinto</label>
            <select name="birth_place" id="for_birth_place" class="form-control">
                <option value=""></option>
            </select>
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_nacionality">Nacionalidad</label>
            <select name="nacionality" id="for_nacionality" class="form-control">
                <option value="Chile">Chile</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_ethnicity">Pueblo originario</label>
            <select name="ethnicity" id="for_ethnicity" class="form-control">
                <option value=""></option>
                <option value="Aymara">Aymara</option>
            </select>
        </fieldset>


    </div>

    <div class="form-row">
        <fieldset class="form-group col-2">
            <label for="for_marital_status">Estado Civil</label>
            <select name="marital_status" id="for_marital_status" class="form-control">
                <option value="">Soltero/a</option>
                <option value="">Casad/a</option>
                <option value="">Viudo/a</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_instrucionLevel">Nivel de Instrucción</label>
            <select name="instrucionLevel" id="for_instrucionLevel" class="form-control">
                @foreach($instructionLevel as $level)
                    <option value="{{ $level['code'] }}">{{ $level['display'] }}</option>
                @endforeach
            </select>
        </fieldset>

    </div>
</form>
@endsection
