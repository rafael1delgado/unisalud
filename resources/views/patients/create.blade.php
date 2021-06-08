@extends('layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Crear nuevo paciente</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
            </div>
        </div>
    </div>

    <form method="POST" class="form-horizontal" action="{{ route('patient.store') }}">
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

        @livewire('user.user-identifiers', compact('identifierTypes'))

        <div class="border-bottom mt-3 mb-3"></div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Datos Personales</h5>
                
                <input type="hidden" name='human_name_use' value='official'>
                <div class="form-row">
                    <fieldset class="form-group col-2">
                        <label for="for_name">Nombres</label>
                        <input type="text" class="form-control" name="text"
                               id="for_name" required
                               {{-- value="{{ substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 7) }}" --}}
                               >
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_fathers_family">Apellido Paterno</label>
                        <input type="text" class="form-control" name="fathers_family"
                               id="for_fathers_family" required
                               {{-- value="{{ substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 7) }}" --}}
                               >
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_mothers_family">Apellido Materno</label>
                        <input type="text" class="form-control" name="mothers_family"
                               id="for_mothers_family" required
                               {{-- value="{{ substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 7) }}" --}}
                               >
                    </fieldset>
                </div>
                <div class="form-row">
                    <fieldset class="form-group col-2">
                        <label for="for_birthday">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="birthday" required
                               {{-- id="for_birthday" value="{{ rand(1900, 2021) }}-{{ rand(10, 12) }}-{{ rand(10, 30) }}" --}}
                               >
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_sex">Sexo</label>
                        <select name="sex" id="for_sex" class="form-control" required>
                            <option value=""></option>
                            <option value="male">Masculino</option>
                            <option value="female">Femenino</option>
                            <option value="unknown">Desconocido</option>
                            <option value="other">Otro</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_gender">Identidad de Género</label>
                        <select name="gender" id="for_gender" class="form-control" required>
                            <option value=""></option>
                            <option value="male">Masculino</option>
                            <option value="female">Femenino</option>
                            <option value="transgender-female">Femenino Trans "FT"</option>
                            <option value="transgender-male">Masculino Trans "MT"</option>
                        </select>
                    </fieldset>

                </div>
                <div class="form-row">
                    <fieldset class="form-group col-2">
                        <label for="for_nacionality">Nacionalidad</label>
                        <select name="nacionality" id="for_nacionality" class="form-control" required>
                            <option value=""></option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_etnia">Pueblo originario</label>
                        <select name="etnia_id" id="for_etnia_id" class="form-control">
                            <option value=""></option>
                                @foreach($etnias as $etnia)
                                    <option value="{{ $etnia->id }}">{{ $etnia->name}}</option>
                                @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_cod_con_marital_id">Estado Civil</label>
                        <select name="cod_con_marital_id" id="for_cod_con_marital_id" class="form-control" required>
                            <option value=""></option>
                            @foreach($maritalStatus as $status)
                                <option value="{{ $status->id }}">{{ $status->text }}</option>
                            @endforeach
                        </select>
                    </fieldset>

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

        @livewire('user.user-addresses', compact('regions', 'countries'))

        <div class="border-bottom mt-3 mb-3"></div>

        @livewire('user.user-contact-points')

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
