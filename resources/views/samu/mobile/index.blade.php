@extends('layouts.app')

@section('content')

@include('nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Listado de Moviles</h3>

<div class="row mb-4">
    <div class="col-12 col-md-6">
        <form method="GET" class="form-horizontal" action="">
            <div class="input-group mb-sm-0">
                <input class="form-control" type="text" name="search" autocomplete="off" id="for_search"
                    style="text-transform: uppercase;"
                    placeholder="Numero Movil" value="" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-2">
        <a class="btn btn-success" href="{{ route('samu.mobile.create') }}">
            <i class="fas fa-plus"></i> Agregar
        </a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-sm table-bordered table-striped small">
        <thead>
            <tr class="text-center table-info">
                <th>Número</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>2</td>
                <td>Movil 2</td>
                <td class="bg-warning">Activo</td>
                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>4</td>
                <td>Movil 12</td>
                <td class="bg-warning">Activo</td>
                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>5</td>
                <td>Movil 11</td>
                <td class="bg-warning">Activo</td>
                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>8</td>
                <td>Movil 15</td>
                <td class="bg-warning">Activo</td>
                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
            </tr>

            <tr>
                <td>10</td>
                <td>Movil 4</td>
                <td class="bg-danger">Inactivo</td>
                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
            </tr>

            <tr>
                <td>11</td>
                <td>Movil 13</td>
                <td class="bg-danger">inactivo</td>
                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
