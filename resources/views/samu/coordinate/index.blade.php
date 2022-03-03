@extends('layouts.app')

@section('content')

@include('samu.nav')


<h3 class="mb-3"><i class="fas fa-globe"></i> Coordenadas ingresadas</h3>

<div class="row mb-4">
    <div class="col-12 col-md-6">
        <form method="GET" class="form-horizontal" action="">
            <div class="input-group mb-sm-0">
                <input class="form-control" type="text" name="search" autocomplete="off" id="for_search"
                    style="text-transform: uppercase;"
                    placeholder="Nombre" value="" required>
                <div class="input-group-append">
                    <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>
    </div>
    <div class="col-12 col-md-2">
        <a class="btn btn-success" href="{{ route('samu.coordinate.create') }}">
            <i class="fas fa-plus"></i> Agregar
        </a>
    </div>
</div>
<div class="table-responsive">
    <table class="table table-sm table-bordered table-striped small">
        <thead>
            <tr class="text-center table-info">
                <th>Nombre</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Observación</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

@endsection
