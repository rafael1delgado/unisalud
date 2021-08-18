@extends('layouts.app')

@section('content')

@include('nav')

<h3 class="mb-3"><i class="fas fa-lock"></i> Lista de Codificacion de Claves</h3>

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
        <a class="btn btn-success" href="{{ route('samu.cclave.create') }}">
            <i class="fas fa-plus"></i> Agregar
        </a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-sm table-bordered table-striped small">
        <thead>
            <tr class="text-center table-info">
                <th>Codigo</th>
                <th>Nombre</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Mhyhhhz</td>
                <td>Nombre 1</td>
                <td><a href="{{ route('samu.cclave.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>Mnnnmmmmm</td>
                <td>Nombre 2</td>
                <td><a href="{{ route('samu.cclave.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>NBBBBBJH</td>
                <td>Nombre 3</td>
                <td><a href="{{ route('samu.cclave.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>NJJJHJz</td>
                <td>Nombre 4</td>
                <td><a href="{{ route('samu.cclave.edit') }}">Editar</a> </td>
            </tr>
            <tr>
                <td>QAWSEDDD</td>
                <td>Nombre 5</td>
                <td><a href="{{ route('samu.cclave.edit') }}">Editar</a> </td>
            </tr>
        </tbody>
    </table>
</div>

@endsection
