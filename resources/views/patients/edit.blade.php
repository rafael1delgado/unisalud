@extends('layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar paciente</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
            </div>
        </div>
    </div>

    <form method="POST" class="form-horizontal" action="{{ route('patient.update', $patient->id) }}">
        @csrf
        @method('POST')

        <div class="form-row">
            <fieldset class="form-group col-2">
                <label for="for_id_type">Tipo de paciente</label>
                <select name="id_patient_type" id="for_id_patient_type" class="form-control">
                    <option value="PN">Normal</option>
                </select>
            </fieldset>
        </div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Datos Personales</h5>
                <div class="form-row">
                    <fieldset class="form-group col-2">
                        <label for="for_id_type">Tipo de identificación</label>
                        <select name="id_type" id="for_id_type" class="form-control">
                            <option value="PN">RUN</option>
                            <option value="PPN">Pasaporte</option>
                            <option value="MR">N° ficha</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_run">Run</label>
                        <input type="text" class="form-control" name="run"
                               id="for_run" required value="  ">
                    </fieldset>

                    <fieldset class="form-group col-1">
                        <label for="for_dv">Dígito verificador</label>
                        <input type="text" class="form-control" name="dv"
                               id="for_dv" required value="">
                    </fieldset>
                </div>

                <div class="form-row">
                    <fieldset class="form-group col-2">
                        <label for="for_name">Nombres</label>
                        <input type="text" class="form-control" name="text"
                               id="for_name" required
                               value="{{ $patient->officialName }}">
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_fathers_family">Apellido Paterno</label>
                        <input type="text" class="form-control" name="fathers_family"
                               id="for_fathers_family" required
                               value="{{ $patient->officialFathersFamily }}">
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_mothers_family">Apellido Materno</label>
                        <input type="text" class="form-control" name="mothers_family"
                               id="for_mothers_family" required
                               value="{{ $patient->officialMothersFamily }}">
                    </fieldset>
                </div>
                <div class="form-row">
                    <fieldset class="form-group col-2">
                        <label for="for_birthday">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="birthday"
                               id="for_birthday" value="{{ $patient->birthday }}">
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_gender">Sexo</label>
                        <select name="gender" id="for_gender" class="form-control">
                            <option value=""></option>
                            <option value="male" selected>Masculino</option>
                            <option value="female">Femenino</option>
                            <option value="unknown">Desconocido</option>
                            <option value="other">Otro</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_gender_identity">Identidad de Genero</label>
                        <select name="gender_identity" id="for_gender_identity" class="form-control">
                            <option value=""></option>
                            <option value="male" selected>Masculino</option>
                            <option value="female">Femenino</option>
                            <option value="female">Femenino Trans "FT"</option>
                            <option value="female">Masculino Trans "MT"</option>
                            {{--                @foreach ($genderIdentities as $identity)--}}
                            {{--                    <option value="{{ $identity['code'] }}">{{ $identity['display'] }}</option>--}}
                            {{--                @endforeach--}}
                        </select>
                    </fieldset>

                    {{-- <fieldset class="form-group col-2">
                        <label for="for_birth_place">País de nacimeinto</label>
                        <select name="birth_place" id="for_birth_place" class="form-control">
                            <option value=""></option>
                        </select>
                    </fieldset> --}}

                </div>
                <div class="form-row">
                    <fieldset class="form-group col-2">
                        <label for="for_nacionality">Nacionalidad</label>
                        <select name="nacionality" id="for_nacionality" class="form-control">
                            <option value="CL-Chile">Chile</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_ethnicity">Pueblo originario</label>
                        <select name="ethnicity" id="for_ethnicity" class="form-control">
                            <option value=""></option>
                            <option value="01" selected>Mapuche</option>


                            {{--                @foreach($aboriginals as $aboriginal)--}}
                            {{--                    <option value="{{ $aboriginal['code'] }}">{{ $aboriginal['display'] }}</option>--}}
                            {{--                @endforeach--}}
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_cod_con_marital_id">Estado Civil</label>
                        <select name="cod_con_marital_id" id="for_cod_con_marital_id" class="form-control" required>
                            <option value=""></option>
                            @foreach($maritalStatus as $status)
                                <option value="{{ $status->id }}" {{$status->id === $patient->cod_con_marital_id ? 'selected' : '' }} >{{ $status->text }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    {{--        <fieldset class="form-group col-2">--}}
                    {{--            <label for="for_instrucionLevel">Nivel de Instrucción</label>--}}
                    {{--            <select name="instrucionLevel" id="for_instrucionLevel" class="form-control">--}}
                    {{--                @foreach($instructionLevel as $level)--}}
                    {{--                    <option value="{{ $level['code'] }}">{{ $level['display'] }}</option>--}}
                    {{--                @endforeach--}}
                    {{--            </select>--}}
                    {{--        </fieldset>--}}

                    {{--        <fieldset class="form-group col-2">--}}
                    {{--            <label for="for_prevision">Previsión</label>--}}
                    {{--            <select name="prevision" id="for_prevision" class="form-control">--}}
                    {{--                @foreach($previciones as $previcion)--}}
                    {{--                    <option value="{{ $previcion['code'] }}">{{ $previcion['display'] }}</option>--}}
                    {{--                @endforeach--}}
                    {{--            </select>--}}
                    {{--        </fieldset>--}}
                </div>
            </div>
        </div>


        <div class="border-bottom mt-3 mb-3"></div>

        @livewire('user.user-addresses', compact('communes', 'regions', 'countries', 'patient'))

        <div class="border-bottom mt-3 mb-3"></div>

        @livewire('user.user-contact-points', compact('patient'))

        <div class="border-bottom mt-3 mb-3"></div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Previsión</h5>

                <div class="form-row">
                    <fieldset class="form-group col-2">
                        <label for="">Rut Previsión</label>
                        <input type="text" class="form-control" name="identifier"
                               id="for_identifier">
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="">Vencimiento</label>
                        <input type="date" class="form-control" name="identifier"
                               id="for_identifier">
                    </fieldset>
                </div>

                <div class="form-row">
                    <fieldset class="form-group col-2">
                        <label for="">Titular</label>
                        <input type="text" class="form-control" name="identifier"
                               id="for_identifier">
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="">Previsión</label>
                        <input type="text" class="form-control" name="identifier"
                               id="for_identifier">
                    </fieldset>
                </div>
            </div>
        </div>


        <button type="submit" class="btn btn-primary">Guardar</button>

    </form>
@endsection
