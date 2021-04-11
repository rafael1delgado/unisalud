@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mis datos personales</h1>
</div>

<form method="POST" class="form-horizontal" action="{{ route('profile.update') }}">
    @csrf
    @method('PUT')

    <div class="form-row">
        <fieldset class="form-group col-6 col-md-2">
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
                id="for_identifier" value="{{ $user['identifier'][0]['value'] }}" readonly>
        </fieldset>

    </div>

    <div class="form-row">

        <fieldset class="form-group col-12 col-md-4">
            <label for="for_name">Nombre</label>
            <input type="text" class="form-control" name="name"
                id="for_name" readonly value="{{ implode(' ',$user['name'][0]['given']) }}">
        </fieldset>


        <fieldset class="form-group col-12 col-md-3">
            <label for="for_fathers_family">Apellido Paterno</label>
            <input type="text" class="form-control" name="fathers_family"
                id="for_fathers_family" readonly value=
                "{{ $user['name'][0]['_family']['extension'][0]['valueString'] }}">
        </fieldset>

        <fieldset class="form-group col-12 col-md-3">
            <label for="for_mothers_family">Apellido Materno</label>
            <input type="text" class="form-control" name="mothers_family"
                id="for_mothers_family" readonly value=
                "{{ $user['name'][0]['_family']['extension'][1]['valueString'] }}">
        </fieldset>

        <fieldset class="form-group col-12 col-md-2">
            <label for="for_birthDate">F. Nacimiento</label>
            <input type="date" class="form-control" name="birthDate"
                id="for_birthDate" readonly value=
                "{{ $user['birthDate'] }}">
        </fieldset>

        <fieldset class="form-group col-6 col-md-2">
            <label for="for_gender">Sexo</label>
            <select name="gender" id="for_gender" class="form-control" aria-readonly disabled>
            @php($genders = ['male' => 'Masculino', 'female' => 'Femenino', 'unknown' => 'Desconocido', 'other' => 'Otro'])
            @foreach($genders as $key => $value)
                <option value="{{ $key }}" @if($key == $user['gender']) selected @endif>{{$value}}</option>
            @endforeach
            </select>
            <input type="hidden" name="gender" value="{{ $genders[$user['gender']] }}">
        </fieldset>

        <fieldset class="form-group col-6 col-md-2">
            <label for="for_marital_status">Estado Civil</label>
            <select name="marital_status" id="for_marital_status" class="form-control" required>
            @php($maritalStatus = ['S|Never Married|Soltero/a', 'M|Married|Casado/a', 'D|Divorced|Divorciado/a', 'W|Widowed|Viudo/a', 'L|Legally Separated|Separado/a', 'T|Domestic partner|Conviviente'])
                @foreach($maritalStatus as $status)
                    @php($statusText = explode('|', $status))
                    <option value="{{ $status }}" @if($statusText[2] == $user['maritalStatus']['text']) selected @endif>{{ $statusText[2] }}</option>
                @endforeach
            </select>
        </fieldset>
    </div>

        <div class="border-bottom mt-3 mb-3"></div>
    <div class="form-row">
        <fieldset class="form-group col-3 col-md-1">
            <label for="for_streeNameType">Via de acceso</label>
            <select name="streeNameType" id="for_streeNameType" class="form-control">
            @php($streetTypes = ['Calle', 'Avenida', 'Pasaje', 'Camino', 'Otro'])
            @foreach($streetTypes as $type)
                <option value="{{ $type }}" @if($type == $user['address'][0]['_line'][0]['extension'][0]['valueString']) selected @endif>{{ $type }}</option>
            @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-9 col-md-5">
            <label for="for_streetName">Calle</label>
            <input type="text" class="form-control" name="streetName"
                id="for_streetName" required value="{{ $user['address'][0]['_line'][0]['extension'][1]['valueString'] ?? '' }}">
        </fieldset>

        <fieldset class="form-group col-2 col-md-1">
            <label for="for_addressNumber">Número</label>
            <input type="text" class="form-control" name="addressNumber"
                id="for_addressNumber" required value="{{ $user['address'][0]['_line'][0]['extension'][2]['valueString'] ?? '' }}">
        </fieldset>

        <fieldset class="form-group col-2 col-md-1">
            <label for="for_addressApartament">Depto</label>
            <input type="text" class="form-control" name="addressApartament"
                id="for_addressApartament" value="{{ $user['address'][0]['_line'][0]['extension'][3]['valueString'] ?? '' }}">
        </fieldset>

        <fieldset class="form-group col-8 col-md-4">
            <label for="for_poblacion">Población/Villa/Condominio</label>
            <input type="text" class="form-control" name="poblacion" readonly disabled
                id="for_poblacion" required value="{{ $user['address'][0]['_line'][0]['extension'][4]['valueString'] ?? '' }}">
        </fieldset>
    </div>


    <div class="form-row">
        <fieldset class="form-group col-6 col-md-2">
            <label for="for_latitud">Latitud</label>
            <input type="number" class="form-control" name="latitud"
                id="for_latitud" required value="{{ $user['address'][0]['extension'][0]['extension'][0]['valueDecimal'] ?? '' }}">
        </fieldset>
        <fieldset class="form-group col-6 col-md-2">
            <label for="for_longitud">Longitud</label>
            <input type="number" class="form-control" name="longitud"
                id="for_longitud" required value="{{ $user['address'][0]['extension'][0]['extension'][1]['valueDecimal'] ?? '' }}">
        </fieldset>
        <fieldset class="form-group col-6 col-md-2">
            <label for="for_city">Ciudad</label>
            <input type="text" class="form-control" name="city"
                id="for_city" required value="{{ $user['address'][0]['city'] ?? '' }}">
        </fieldset>
        
        <fieldset class="form-group col-6 col-md-2">
            <label for="for_district">Comuna</label>
            <select name="district" id="for_district" class="form-control">
            @php($communes = ['Iquique', 'Pica', 'Alto Hospicio', 'Pozo Almonte', 'Huara', 'Camiña', 'Colchane'])
            @foreach($communes as $commune)
                <option value="{{ $commune }}" @if($commune == $user['address'][0]['district']) selected @endif>{{ $commune }}</option>
            @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-9 col-md-2">
            <label for="for_state">Región</label>
            <select name="state" id="for_state" class="form-control" aria-readonly>
                <option value="Tarapacá">Región de Tarapacá</option>
            </select>
        </fieldset>
        <fieldset class="form-group col-3 col-md-2">
            <label for="for_country">País</label>
            <select name="country" id="for_country" class="form-control" aria-readonly>
                <option value="Chile">Chile</option>
            </select>
        </fieldset>

    </div>

    <div class="border-bottom mt-3 mb-3"></div>

    <div class="form-row">

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_phone1">Teléfono personal</label>
            <input type="text" class="form-control" name="phone1"
                id="for_phone1" required value="{{ $user['telecom'][0]['value'] ?? '' }}">
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_phone2">Teléfono trabajo</label>
            <input type="text" class="form-control" name="phone2"
                id="for_phone2" value="{{ $user['telecom'][1]['value'] ?? '' }}">
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_email">Correo Electrónico personal</label>
            <input type="text" class="form-control" name="email"
                id="for_email" required value="{{ $user['telecom'][2]['value'] ?? '' }}">
        </fieldset>
        
        <fieldset class="form-group col-6 col-md-3">
            <label for="for_email2">Correo Electrónico trabajo</label>
            <input type="text" class="form-control" name="email2"
                id="for_email2" value="{{ $user['telecom'][3]['value'] ?? '' }}">
        </fieldset>

    </div>

    <a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a> 
    <button type="submit" class="btn btn-primary">Actualizar</button>

</form>
@endsection
