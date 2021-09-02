@extends('layouts.app')

@section('title', 'Registrar nueva ausencia laboral')

@section('content')

<link href="{{ asset('css/bootstrap-select.min.css') }}" rel="stylesheet" type="text/css"/>

<h3 class="mb-3">Registrar nueva ausencia laboral</h3>

{{--<form method="POST" class="form-horizontal" action="{{ route('absences.import') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="file" accept=".xlsx, .xls, .csv" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04">
            <label class="custom-file-label" for="inputGroupFile04">Elegir archivo excel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Importar</button>
        </div>
    </div>
</form>--}}

<form method="POST" class="form-horizontal" action="{{ route('absences.store') }}">
    @csrf
    @method('POST')

    @livewire('absence.asign-user-inputs-form')
    <hr>
    <div class="row">
        <fieldset class="form-group col-md-4">
            <label for="for_type">Tipo de ausentismo</label>
            <select name="type" id="for_type" class="form-control">
              <option value="">--</option>
              <option value="COMISION DE SERVICIO">COMISION DE SERVICIO</option>
              <option value="DIAS COMPENSATORIOS">DIAS COMPENSATORIOS</option>
              <option value="FERIADOS LEGALES">FERIADOS LEGALES</option>
              <option value="L.M. ACCIDENTE EN TRAYECTORIA AL TRABAJO">L.M. ACCIDENTE EN TRAYECTORIA AL TRABAJO</option>
              <option value="L.M. ENFERMEDAD">L.M. ENFERMEDAD</option>
              <option value="L.M. ENFERMEDAD PROFESIONAL">L.M. ENFERMEDAD PROFESIONAL</option>
              <option value="L.M. MATERNAL">L.M. MATERNAL</option>
              <option value="L.M. PATOLOGIA DEL EMBARAZO">L.M. PATOLOGIA DEL EMBARAZO</option>
              <option value="L.M. PRORROGA DE MEDICINA PREVENTIVA">L.M. PRORROGA DE MEDICINA PREVENTIVA</option>
              <option value="PERMISO GREMIAL">PERMISO GREMIAL</option>
              <option value="PERMISO LACTANCIA">PERMISO LACTANCIA</option>
              <option value="PERMISO POR MATRIMONIO/ACUERDO UNION CIVIL">PERMISO POR MATRIMONIO/ACUERDO UNION CIVIL</option>
              <option value="PERMISOS ADMINISTRATIVOS">PERMISOS ADMINISTRATIVOS</option>
              <option value="PERMISOS S/SUELDOS">PERMISOS S/SUELDOS</option>
              <option value="POSTNATAL PARENTAL">POSTNATAL PARENTAL</option>
              <option value="TELETRABAJO FUNCIONES HABITUALES">TELETRABAJO FUNCIONES HABITUALES</option>
              <option value="TELETRABAJO FUNCIONES NO HABITUALES">TELETRABAJO FUNCIONES NO HABITUALES</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-md-2">
            <label for="for_legal_quality">Calidad jurídica</label>
            <select name="legal_quality" id="for_legal_quality" class="form-control">
              <option value="">--</option>
              <option value="CONTRATADOS">CONTRATADOS</option>
              <option value="CONTRATOS">CONTRATOS</option>
              <option value="HONORARIOS">HONORARIOS</option>
              <option value="TITULAR">TITULAR</option>
              <option value="TITULARES">TITULARES</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-md-2">
            <label for="for_staff">Planta</label>
            <select name="staff" id="for_staff" class="form-control">
              <option value="">--</option>
              <option value="ADMINISTRATIVOS">ADMINISTRATIVOS</option>
              <option value="AUXILIARES">AUXILIARES</option>
              <option value="DIRECTIVOS">DIRECTIVOS</option>
              <option value="FARMACEUTICOS">FARMACEUTICOS</option>
              <option value="MEDICOS">MEDICOS</option>
              <option value="ODONTOLOGOS">ODONTOLOGOS</option>
              <option value="PROFESIONALES">PROFESIONALES</option>
              <option value="QUÍMICOS FARMACÉUTICOS">QUÍMICOS FARMACÉUTICOS</option>
              <option value="TECNICOS">TECNICOS</option>
              <option value="Sin PLANTA">Sin PLANTA</option>
            </select>
        </fieldset>

        <div class="form-group col-md-2">
            <label for="for_res_number">N° Resolución</label>
            <input type="number" class="form-control" id="for_res_number" name="res_number">
        </div>

        <fieldset class="form-group col-md-2">
            <label for="for_res_date">Fecha Resolución</label>
            <input type="date" class="form-control" id="for_res_date" name="res_date">
        </fieldset>
    </div>

    <div class="row">

        <fieldset class="form-group col-2">
            <label for="for_start_date">Fecha inicio ausencia</label>
            <input type="date" class="form-control" id="for_start_date" name="start_date" required >
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_end_date">Fecha término ausencia</label>
            <input type="date" class="form-control" id="for_end_date" name="end_date" required >
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_total_days">Total días de ausentismo</label>
            <input type="number" class="form-control" id="for_total_days" name="total_days" step=".1">
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_period_days">Ausentismo en el periodo</label>
            <input type="number" class="form-control" id="for_period_days" name="period_days" step=".1">
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_license_cost">Costo de licencia</label>
            <input type="number" class="form-control" id="for_license_cost" name="license_cost" step=".1">
        </fieldset>

        <fieldset class="form-group col-2">
            <label for="for_balance_days_not_replaced">Saldo días no reemplazados</label>
            <input type="number" class="form-control" id="for_balance_days_not_replaced" name="balance_days_not_replaced">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')
<script src="{{ asset('js/bootstrap-select.min.js') }}"></script>
@endsection
