@extends('layouts.app')

@section('title', 'Nuevo Staff')

@section('content')

@include('fq.partials.nav')

<br>

<h5>Ingreso de Solicitud</h5>

<br>

<h6>Contacto</h6>
<br>
    <div class="form-row">
        <fieldset class="form-group col-sm-2">
            <label for="for_run">RUT</label>
            <input type="text" class="form-control" name="run" id="for_run" value="{{ $contactUser->run }}" readonly>
        </fieldset>
        <fieldset class="form-group col-sm-1">
            <label for="for_dv">DV</label>
            <input type="text" class="form-control" name="dv" id="for_dv" value="{{ $contactUser->dv }}" readonly>
        </fieldset>
        <fieldset class="form-group col-3">
            <label for="for_name">Nombres</label>
            <input type="text" class="form-control" name="name" id="for_name" value="{{ $contactUser->name }}" readonly>
        </fieldset>
        <fieldset class="form-group col-3">
            <label for="for_name">Apellido Paterno</label>
            <input type="text" class="form-control" name="fathers_family" id="for_fathers_family" value="{{ $contactUser->fathers_family }}" readonly>
        </fieldset>
        <fieldset class="form-group col-3">
            <label for="for_name">Apellido Materno</label>
            <input type="text" class="form-control" name="mothers_family" id="for_mothers_family" value="{{ $contactUser->mothers_family }}" readonly>
        </fieldset>
    </div>

<hr>

<h6>Paciente</h6>
<br>

<form method="POST" class="form-horizontal" action="{{ route('fq.request.store', $contactUser) }}" enctype="multipart/form-data">
    @csrf
    @method('POST')

    <table class="table small table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th style="width: 11%">Run</th>
                <th>Nombre Completo</th>
                <th>Nº Ficha</th>
                <th>Teléfono</th>
                <th>Email</th>
                <th>Dirección</th>
                <!-- <th style="width: 5%"></th> -->
                <th style="width: 2%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactUser->usersPatients as $usersPatients)
            <tr>
                <td>{{ $usersPatients->patient->RunFormat }}</td>
                <td>{{ $usersPatients->patient->FullName }}</td>
                <td align="center">{{ $usersPatients->patient->clinical_history_number }}</td>
                <td align="center">{{ $usersPatients->patient->telephone }}<br>
                  {{ $usersPatients->patient->telephone2 }}
                </td>
                <td>{{ $usersPatients->patient->email }}</td>
                <td align="center">{{ $usersPatients->patient->address }}<br>
                  {{ $usersPatients->patient->commune }}
                </td>
                <!-- <td>
                    <a href="" class="btn btn-outline-secondary btn-sm disabled" title="Ir" target="_blank"> <i class="far fa-eye"></i></a>
                </td> -->
                <td>
                    <fieldset class="form-group">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="patient_id"
                                value="{{ $usersPatients->patient->id }}" required>
                        </div>
                    </fieldset>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <hr>

    <div class="form-row">
        <fieldset class="form-group col-3">
            <label for="for_name">Motivo de Solicitud</label>
            <select name="name" id="for_name" class="form-control" required>
                <option value="">Seleccione...</option>
                <option value="specialty hours">Horas de especialidad</option>
                <option value="medicines">Medicamentos</option>
                <option value="exam order">Orden de exámenes</option>
                <option value="home hospitalization">Contacto con hospitalización domiciliaria</option>
            </select>
        </fieldset>
        <fieldset class="form-group col-sm-9">
            <label for="for_observation_patient">Observación</label>
            <input type="text" class="form-control" name="observation_patient" id="for_observation_patient">
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
