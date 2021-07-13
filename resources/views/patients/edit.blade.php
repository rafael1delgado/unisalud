@extends('layouts.app')

@section('content')
    <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Editar paciente</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
{{--            <div class="btn-group mr-2">--}}
{{--                <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>--}}
{{--            </div>--}}
        </div>
    </div>

    <form method="POST" class="form-horizontal" action="{{ route('patient.update', $patient->id) }}">
        @csrf
        @method('POST')

{{--        <div class="form-row">--}}
{{--            <fieldset class="form-group col-2">--}}
{{--                <label for="for_id_type">Tipo de paciente</label>--}}
{{--                <select name="id_patient_type" id="for_id_patient_type" class="form-control">--}}
{{--                    <option value="PN">Normal</option>--}}
{{--                </select>--}}
{{--            </fieldset>--}}
{{--        </div>--}}

        @livewire('user.user-identifiers', compact('identifierTypes', 'patient'))

        <div class="border-bottom mt-3 mb-3"></div>

        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Datos Personales</h5>
                <input type="hidden" name='human_name_use' value='official'>
                <div class="form-row">
                    <fieldset class="form-group col-md-6">
                        <label for="for_name">Nombres</label>
                        <input type="text" class="form-control" name="text"
                               id="for_name" required
                               value="{{ $patient->actualOfficialHumanName->text }}">
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="for_fathers_family">Apellido Paterno</label>
                        <input type="text" class="form-control" name="fathers_family"
                               id="for_fathers_family" required
                               value="{{ $patient->actualOfficialHumanName->fathers_family }}">
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="for_mothers_family">Apellido Materno</label>
                        <input type="text" class="form-control" name="mothers_family"
                               id="for_mothers_family" required
                               value="{{ $patient->actualOfficialHumanName->mothers_family }}">
                    </fieldset>
                </div>
                <div class="form-row">
                    <fieldset class="form-group col-md-4">
                        <label for="for_birthday">Fecha de nacimiento</label>
                        <input type="date" class="form-control" name="birthday"
                               id="for_birthday" value="{{ $patient->birthday }}">
                    </fieldset>

                    <fieldset class="form-group col-md-4">
                        <label for="for_sex">Sexo</label>
                        <select name="sex" id="for_sex" class="form-control">
                            <option value=""></option>
                            <option value="male" {{$patient->sex === 'male'? 'selected' : ''}}>Masculino</option>
                            <option value="female" {{$patient->sex === 'female'? 'selected' : ''}}>Femenino</option>
                            <option value="unknown" {{$patient->sex === 'unknown'? 'selected' : ''}}>Desconocido</option>
                            <option value="other" {{$patient->sex === 'other'? 'selected' : ''}}>Otro</option>
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-md-4">
                        <label for="for_gender">Identidad de Genero</label>
                        <select name="gender" id="for_gender" class="form-control">
                            <option value=""></option>
                        <option value="male" {{$patient->gender === 'male'? 'selected' : ''}}>Masculino</option>
                        <option value="female" {{$patient->gender === 'female'? 'selected' : ''}}>Femenino</option>
                        <option value="transgender-female" {{$patient->gender === 'transgender-female'? 'selected' : ''}}>Femenino Trans "FT"</option>
                        <option value="transgender-male" {{$patient->gender === 'transgender-male'? 'selected' : ''}}>Masculino Trans "MT"</option>
                        <option value="other" {{$patient->gender === 'other'? 'selected' : ''}}>Otro</option>
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

                <fieldset class="form-group col-md-4">
                    <label for="for_nationality_id">Nacionalidad</label>
                    <select name="nationality_id" id="for_nationality_id" class="form-control" required>
                        <option value=""></option>
                        @foreach($countries as $country)
                        <option value="{{ $country->id }}" {{$country->id === $patient->nationality_id ? 'selected' : ''}} >{{ $country->name }}</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="form-group col-md-4">
                    <label for="for_congregation">Pueblo originario</label>
                    <select name="congregation_id[]" id="for_congregation_id" class="form-control selectpicker"
                            data-live-search="true" multiple="" data-size="10" title="Seleccione..." multiple
                            data-actions-box="true">
                        @foreach($congregations as $congregation)
                        <option value="{{ $congregation->id }}" {{in_array($congregation->id, $patientCongregationIds)  ? 'selected' : ''}} >{{ $congregation->name}}</option>
                        @endforeach
                    </select>
                </fieldset>

                {{--                <div id="otro_etnia">--}}
                    <fieldset class="form-group col-md-4">
                        <label for="for_congregation_other">Otro Pueblo Originario</label>
                        <input type="text" class="form-control" name="congregation_other" id="for_congregation_other"
                               value="{{$congregationOther}}"
                               disabled>
                    </fieldset>
                    {{--                </div>--}}
                </div>

                <div class="form-row">
                    <fieldset class="form-group col-md-4">
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
                    <fieldset class="form-group col-md-2">
                        <label for="">Rut Previsión</label>
                        <input type="text" class="form-control" name="identifier"
                               id="for_identifier">
                    </fieldset>

                    <fieldset class="form-group col-md-4">
                        <label for="">Vencimiento</label>
                        <input type="date" class="form-control" name="identifier"
                               id="for_identifier">
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="">Titular</label>
                        <input type="text" class="form-control" name="identifier"
                               id="for_identifier">
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="">Previsión</label>
                        <input type="text" class="form-control" name="identifier"
                               id="for_identifier">
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="border-bottom mt-3 mb-3"></div>

        @livewire('user.user-practitioners', compact('organizations', 'professions', 'specialties', 'patient'))

        <div class="border-bottom mt-3 mb-3"></div>

        <button type="submit" class="btn btn-primary mb-3">Guardar</button>

    </form>
@endsection
@section('custom_js')
    <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap-select.min.css') }}">

    <script src='{{asset("js/jquery.rut.chileno.js")}}'></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            //obtiene digito verificador
            $('input[name=run]').keyup(function (e) {
                var str = $("#for_run").val();
                $('#for_dv').val($.rut.dv(str));
            });

            // $('#otro_etnia').hide();
            $('#for_congregation_id').change(function () {
                var fieldsetName = $(this).val();
                // console.log(fieldsetName);

                if (fieldsetName.includes("10")) {
                    $('#for_congregation_other').attr("disabled", false);
                    $('#for_congregation_other').attr("required", true);
                } else {
                    $('#for_congregation_other').val('');
                    $('#for_congregation_other').attr("required", false);
                    $('#for_congregation_other').attr("disabled", true);
                }

                // switch(this.value){
                //     case "10":
                //      //   $('#for_other_specialty').attr("disabled", false);
                //      $('#otro_etnia').show();
                //         break;
                //
                //     default:
                //     $('#otro_etnia').show();
                //         $('#otro_etnia').attr("disabled", true);
                //         document.getElementById('#otro_etnia').value = '';
                //         break;
                // }
            });

        });
    </script>
    <script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
    <script src="{{ asset('js/defaults-es_CL.min.js') }}"></script>

@endsection
