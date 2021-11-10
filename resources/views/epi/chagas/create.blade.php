@extends('layouts.app')

@section('content')

<h3 class="mb-3">Nueva Solicitud de Chagas</h3>


<form method="POST" class="form-horizontal" action="#" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="form-row">
        <fieldset class="form-group col-10 col-md-3">
            <label for="for_run">Run</label>
            <input type="hidden" class="form-control" id="for_id" name="id">
            <input type="number" max="50000000" class="form-control" id="for_run" name="run">
        </fieldset>

        <fieldset class="form-group col-2 col-md-1">
            <label for="for_dv">DV</label>
            <input type="text" class="form-control" id="for_dv" name="dv" readonly>
        </fieldset>

        <fieldset class="form-group col-12 col-md-3">
            <label for="for_other_identification">Otra identificación</label>
            <input type="text" class="form-control" id="for_other_identification"
                placeholder="Extranjeros sin run" name="other_identification">
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_gender">Género</label>
            <select name="gender" id="for_gender" class="form-control genero">
                <option value="male">Masculino</option>
                <option value="female">Femenino</option>
                <option value="other">Otro</option>
                <option value="unknown">Desconocido</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-6 col-md-2">
            <label for="for_birthday">Fecha Nacimiento</label>
            <input type="date" class="form-control" id="for_birthday"
                name="birthday" required>
        </fieldset>

    </div>

    <div class="form-row">
        <fieldset class="form-group col-12 col-md-4">
            <label for="for_name">Nombres *</label>
            <input type="text" class="form-control" id="for_name" name="name"
             style="text-transform: uppercase;" required>
        </fieldset>

        <fieldset class="form-group col-6 col-md-4">
            <label for="for_fathers_family">Apellido Paterno *</label>
            <input type="text" class="form-control" id="for_fathers_family"
                name="fathers_family" style="text-transform: uppercase;" required>
        </fieldset>

        <fieldset class="form-group col-6 col-md-4">
            <label for="for_mothers_family">Apellido Materno</label>
            <input type="text" class="form-control" id="for_mothers_family"
                name="mothers_family" style="text-transform: uppercase;">
        </fieldset>


    </div>

    <hr>

    <div class="form-row">

        <fieldset class="form-group col-6 col-md-2">
            <label for="for_sample_at">Fecha Muestra</label>
            <input type="date" class="form-control" id="for_sample_at"
                name="sample_at" required min="{{ date('Y-m-d', strtotime('-2 week')) }}" max="{{ date('Y-m-d') }}">
        </fieldset>

        <fieldset class="form-group col-6 col-md-3">
            <label for="for_sample_type">Grupo de Pesquiza</label>
            <select name="sample_type" id="for_sample_type" class="form-control">
                <option value=""></option>
                <option value="TÓRULAS NASOFARÍNGEAS">Control Pre concepcional</option>
                <option value="ESPUTO">Gestante (+semana gestacional)</option>
                <option value="TÓRULAS NASOFARÍNGEAS/ESPUTO">Estudio de contacto</option>
                <option value="ASPIRADO NASOFARÍNGEO">Morbilidad (cualquier persona)</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-12 col-md-4">
            <label for="for_establishment_id">Establecimiento *</label>
            <select name="establishment_id" id="for_establishment_id" class="form-control" required>
                
                <option value="">Seleccionar Establecimiento</option>                    
                
            </select>
        </fieldset>

        <fieldset class="form-group col-12 col-md-3">
            <label for="for_origin">Estab. Detalle (Opcional)</label>
            <select name="origin" id="for_origin" class="form-control">
                <option value="">Seleccionar Detalle</option>
                
                    <option value=""></option>
                
            </select>
        </fieldset>

        <fieldset class="form-group col-4 col-md-2">
            <label for="for_age">Edad</label>
            <input type="number" class="form-control" id="for_age" name="age">
        </fieldset>

        <fieldset class="form-group col-8 col-md-3">
            <label for="for_external_laboratory">Laboratorio externo</label>
            <select name="external_laboratory" id="for_external_laboratory" class="form-control">
                <option value=""></option>                
            </select>
        </fieldset>

    </div>

    @can('SuspectCase: tecnologo')
    <div class="form-row">

        <fieldset class="form-group col-6 col-md-2 alert-warning">
            <label for="for_result_ifd_at">Fecha Resultado IFD</label>
            <input type="date" class="form-control" id="for_result_ifd_at"
                name="result_ifd_at" max="{{ date('Y-m-d') }}">
        </fieldset>

        <fieldset class="form-group col-6 col-md-2 alert-warning">
            <label for="for_result_ifd">Resultado IFD</label>
            <select name="result_ifd" id="for_result_ifd" class="form-control">
                <option ></option>
                <option value="Negativo">Negativo</option>
                <option value="Adenovirus">Adenovirus</option>
                <option value="Influenza A">Influenza A</option>
                <option value="Influenza B">Influenza B</option>
                <option value="Metapneumovirus">Metapneumovirus</option>
                <option value="Parainfluenza 1">Parainfluenza 1</option>
                <option value="Parainfluenza 2">Parainfluenza 2</option>
                <option value="Parainfluenza 3">Parainfluenza 3</option>
                <option value="VRS">VRS</option>
                <option value="No solicitado">No solicitado</option>
            </select>
        </fieldset>


        <fieldset class="form-group col-6 col-md-2 alert-warning">
            <label for="for_subtype">Subtipo</label>
            <select name="subtype" id="for_subtype" class="form-control">
                <option value=""></option>
                <option value="H1N1">H1N1</option>
                <option value="H3N2">H3N2</option>
                <option value="INF B">INF B</option>
            </select>
        </fieldset>

    </div>

    <div class="form-row">

        <fieldset class="form-group col-6 col-md-2 alert-danger">
            <label for="for_pcr_sars_cov_2_at">Fecha Resultado PCR</label>
            <input type="date" class="form-control" id="for_pcr_sars_cov_2_at"
                name="pcr_sars_cov_2_at" max="{{ date('Y-m-d') }}">
        </fieldset>

        <fieldset class="form-group col-6 col-md-2 alert-danger">
            <label for="for_pcr_sars_cov_2">PCR SARS-Cov2</label>
            <select name="pcr_sars_cov_2" id="for_pcr_sars_cov_2"
                class="form-control">
                <option value="pending">Pendiente</option>
                <option value="negative">Negativo</option>
                <option value="positive">Positivo</option>
                <option value="rejected">Rechazado</option>
                <option value="undetermined">Indeterminado</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-6 col-md-2">
            <label for="for_sent_external_lab_at">Fecha envío lab externo</label>
            <input type="date" class="form-control" id="for_sent_external_lab_at"
                name="sent_external_lab_at">
        </fieldset>

        @endcan

        @can('SuspectCase: tecnologo')

        <fieldset class="form-group col-12 col-md-3">
            <label for="for_file">Archivo</label>
            <div class="custom-file">
                <input type="file" name="forfile[]" class="custom-file-input" id="forfile" lang="es" multiple>
                <label class="custom-file-label" for="customFileLang">Seleccionar Archivo</label>
            </div>
        </fieldset>

    </div>

    <hr>

    @endcan

    <!-- <div class="form-row">

        <fieldset class="form-group col-4 col-md-1">
            <label for="for_symptoms">Sintomas</label>
            <select name="symptoms" id="for_symptoms" class="form-control">
                <option value=""></option>
                <option value="Si">Si</option>
                <option value="No">No</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-6 col-md-1">
            <label for="for_gestation">Gestante *</label>
            <select name="gestation" id="for_gestation" class="form-control" required>
                <option value=""></option>
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-6 col-md-2">
            <label for="for_gestation_week">Semanas de gestación</label>
            <input type="number" class="form-control" name="gestation_week"
                id="for_gestation_week">
        </fieldset>

        <fieldset class="form-group col-4 col-md-2">
            <label for="for_close_contact">Contacto estrecho</label>
            <select name="close_contact" id="for_close_contact" class="form-control">
                <option value=""></option>
                <option value="0">No</option>
                <option value="1">Si</option>
            </select>
        </fieldset>


    </div> -->

    <div class="form-row">

        <fieldset class="form-group col-6 col-md-6">
            <label for="for_observation">Observación</label>
            <input type="text" class="form-control" name="observation"
                id="for_observation">
        </fieldset>

        <!-- <fieldset class="form-group col-md-2">
            <label for="for_paho_flu">PAHO FLU</label>
            <input type="number" class="form-control" name="paho_flu"
                id="for_paho_flu">
        </fieldset> -->

        {{-- <fieldset class="form-group col-6 col-md-2">
            <label for="for_run_medic">Run Médico Solicitante</label>
            <input type="text" class="form-control" name="run_medic" id="for_run_medic"
                placeholder="Ej: 12345678-9">
        </fieldset> --}}

        <!-- <fieldset class="form-group col-8 col-md-2">
            <label for="for_run_medic_s_dv">Run Médico SIN DV</label>
            <input type="number" class="form-control" id="for_run_medic_s_dv" name="run_medic_s_dv">
        </fieldset>

        <fieldset class="form-group col-4 col-md-1">
            <label for="for_run_medic_dv">DV</label>
            <input type="text" class="form-control" id="for_run_medic_dv" name="run_medic_dv" readonly>
        </fieldset> -->


        <fieldset class="form-group col-6 col-md-6">
            <label for="for_epivigila">Epivigila</label>
            <input type="number" class="form-control" id="for_epivigila"
                name="epivigila">
        </fieldset>


    </div>


    <button type="submit" class="btn btn-primary">Guardar</button>

    <a class="btn btn-outline-secondary" href="#">
        Cancelar
    </a>
</form><br>

@endsection

@section('custom_js')

@endsection
