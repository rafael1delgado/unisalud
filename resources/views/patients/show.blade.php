@extends('layouts.app')

@section('title', 'Ver paciente')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Ver Paciente</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">

            </div>
        </div>
    </div>


    {{--{!! optional($patient)['text']['div'] !!}--}}

    <div class="form-row">
        <fieldset class="form-group col-3">
            <label for=""> <b> Rut: </b> </label>
            <span> {{"{$patient->identifierRun->value} - {$patient->identifierRun->dv}"}} </span>
        </fieldset>
    </div>

    <div class="form-row">
        <fieldset class="form-group col-3">
            <label for=""> <b> Nombre: </b> </label>
            <span> {{"$patient->officialfullName"}} </span>
        </fieldset>
    </div>

    <a href="{{route('patient.edit', $patient->id)}}" class="btn btn-primary">Editar Paciente</a>


@endsection

@section('custom_js')

@endsection
