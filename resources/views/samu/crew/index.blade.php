@extends('layouts.app')

@section('content')

@include('nav')

<h3 class="mb-3"><i class="fas fa-clipboard-list"></i> Lista de la Tripulación</h3>

<div class="row mb-4">
    <div class="col-12 col-md-6">
        <form method="GET" class="form-horizontal" action="">
            <div class="input-group mb-sm-0">
                <input class="form-control" type="text" name="search" autocomplete="off" id="for_search"
                    style="text-transform: uppercase;"
                    placeholder="NOMBRE" value="" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-2">
        <a class="btn btn-success" href="{{ route('samu.crew.create') }}">
            <i class="fas fa-plus"></i> Agregar
        </a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-sm table-bordered table-striped small">
        <thead>
            <tr class="text-center table-info">
                <th>Conductor</th>
                <th>Paramedico</th>
                <th>Reanimador</th>
                <th>Médico</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mario Cortez</td>
                <td>Sofia Valencia</td>
                <td>Carlos Fuentes</td>
                <td>Marta Sanchez</td>
                <td><a href="{{ route('samu.crew.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>Mirta Perez</td>
                <td>Juan Revollo</td>
                <td>Marta Sanchez</td>
                <td>Jesus Valensuela</td>
                <td><a href="{{ route('samu.crew.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>Mario Cortez</td>
                <td>Victor Ureña</td>
                <td>Sofia Valencia</td>
                <td>Najhely Cabrera</td>
                <td><a href="{{ route('samu.crew.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>Agustina Morales</td>
                <td>Helen Arevalos</td>
                <td>Carlos Fuentes</td>
                <td>Jesus Valensuela/td>
                <td><a href="{{ route('samu.crew.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>Rosmery Rios</td>
                <td>Andy Guzman</td>
                <td>Juan pablo cardenas</td>
                <td>Duglas Trujillo</td>
                <td><a href="{{ route('samu.crew.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>Rodrigo Quinteros</td>
                <td>Sandro Via</td>
                <td>Carlos Fuentes</td>
                <td>Rosmery Rios</td>
                <td><a href="{{ route('samu.crew.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>Monserrat Justiniano</td>
                <td>Dafne Guzman</td>
                <td> Maribel Alcocer</td>
                <td>Victor Ureña</td>
                <td><a href="{{ route('samu.crew.edit') }}">Editar</a> </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
