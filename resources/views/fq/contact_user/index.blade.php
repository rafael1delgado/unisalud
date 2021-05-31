@extends('layouts.app')

@section('title', 'FQ - Listado de Contactos')

@section('content')

@include('fq.partials.nav')

<br>

<h5>Solicitudes Pendientes</h5>

<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th>#</th>
                <th>Run</th>
                <th>Nombre Contacto</th>
                <th>Run</th>
                <th>Nombre Paciente</th>
                <th>Teléfono</th>
                <th>E-Mail</th>
                <th>Dirección</th>
                <th style="width: 2%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($contactUsers as $contactUser)
            <tr>
                <td></td>
                <td>{{ $contactUser->RunFormat }}</td>
                <td>{{ $contactUser->FullName }}</td>
                <td>{{ $contactUser->usersPatients->first()->patient->RunFormat }}</td>
                <td>{{ $contactUser->usersPatients->first()->patient->FullName }}</td>
                <td>{{ $contactUser->telephone }} <br>
                    {{ $contactUser->telephone2 }}</td>
                <td>{{ $contactUser->email }}</td>
                <td>{{ $contactUser->address }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('custom_js')

@endsection
