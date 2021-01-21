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
                @foreach ($genderIdentities as $identity)
                    <option value="{{ $identity['code'] }}">{{ $identity['display'] }}</option>
                @endforeach
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

    <div class="border-bottom mt-3 mb-3"></div>

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

        <fieldset class="form-group col-2">
            <label for="for_prevision">Previsión</label>
            <select name="prevision" id="for_prevision" class="form-control">
                @foreach($previciones as $previcion)
                    <option value="{{ $previcion['code'] }}">{{ $previcion['display'] }}</option>
                @endforeach
            </select>
        </fieldset>
    </div>

    <div class="border-bottom mt-3 mb-3"></div>

    <div class="form-row">
        <fieldset class="form-group col-1">
            <label for="for_addressType">Tipo de dirección</label>
            <select name="addressType" id="for_addressType" class="form-control">
                <option value="particular">Particular</option>
                <option value="work">Trabajo</option>
            </select>
        </fieldset>


        <fieldset class="form-group col-1">
            <label for="for_streeNameType">Via de acceso</label>
            <select name="streeNameType" id="for_streeNameType" class="form-control">
                <option value="01">Calle</option>
                <option value="02">Avenida</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_streetName">Calle</label>
            <input type="text" class="form-control" name="streetName"
                id="for_streetName" required placeholder="">
        </fieldset>

        <fieldset class="form-group col-1">
            <label for="for_addressNumber">Número</label>
            <input type="text" class="form-control" name="addressNumber"
                id="for_addressNumber" required placeholder="">
        </fieldset>

        <fieldset class="form-group col-1">
            <label for="for_addressApartament">Depto</label>
            <input type="text" class="form-control" name="addressApartament"
                id="for_addressApartament" required placeholder="">
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_poblacion">Población/Villa/Condominio</label>
            <input type="text" class="form-control" name="poblacion"
                id="for_poblacion" required placeholder="">
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_district">Comuna</label>
            <select name="district" id="for_district" class="form-control">
                <option value="01">Iquique</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_state">Región</label>
            <select name="state" id="for_state" class="form-control">
                <option value="1">Tarapacá</option>
            </select>
        </fieldset>

    </div>


    <div class="form-row">
        <fieldset class="form-group col-1">
            <label for="for_latitud">Latitud</label>
            <input type="text" class="form-control" name="latitud"
                id="for_latitud" required placeholder="">
        </fieldset>
        <fieldset class="form-group col-1">
            <label for="for_longitud">Longitud</label>
            <input type="text" class="form-control" name="longitud"
                id="for_longitud" required placeholder="">
        </fieldset>
        <fieldset class="form-group col-2">
            <label for="for_conutry">País</label>
            <select name="conutry" id="for_conutry" class="form-control">
                <option value="01">Chile</option>
            </select>
        </fieldset>

    </div>

    <div class="border-bottom mt-3 mb-3"></div>

    <div class="form-row">

        <fieldset class="form-group col-1">
            <label for="for_phone1Use">Uso</label>
            <select name="phone1Use" id="for_phone1Use" class="form-control">
                <option value="Personal">Personal</option>
                <option value="work">Trabajo</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-1">
            <label for="for_telphone">Teléfono 1</label>
            <input type="text" class="form-control" name="telphone"
                id="for_telphone" required placeholder="">
        </fieldset>

        <fieldset class="form-group col-1">
            <label for="for_phone2Use">Uso</label>
            <select name="phone2Use" id="for_phone2Use" class="form-control">
                <option value="Personal">Personal</option>
                <option value="work">Trabajo</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-1">
            <label for="for_telphone2">Telefono 2</label>
            <input type="text" class="form-control" name="telphone2"
                id="for_telphone2" required placeholder="">
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_email">Correo Electrónico</label>
            <input type="text" class="form-control" name="email"
                id="for_email" required placeholder="">
        </fieldset>


    </div>
</form>
@endsection
