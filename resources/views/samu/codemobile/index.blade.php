@extends('layouts.app')

@section('content')

@include('nav')

<h3 class="mb-3"><i class="fas fa-lock"></i> Lista de Codificacion de Moviles</h3>

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
        <a class="btn btn-success" href="{{ route('samu.codemobile.create') }}">
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
            @foreach($codemobiles as $codemobile)
            <tr>
                <td>{{ $codemobile->mobile_code }}</td>
                <td>{{ $codemobile->name_mobile_code }}</td>
                <td><a href="#">Editar</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
