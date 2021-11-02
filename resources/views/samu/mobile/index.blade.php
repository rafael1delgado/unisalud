@extends('layouts.app')

@section('content')

@include('nav')

<h3 class="mb-3"><i class="fas fa-lock"></i> Lista de Codificacion de Moviles</h3>

<div class="row mb-4">
    <div class="col-12 col-md-6">
        <form method="GET" class="form-horizontal" action="{{ route('samu.mobile.index') }}">
            <div class="input-group mb-sm-0">
                <input class="form-control" type="text" name="search_mobile" autocomplete="off" id="for_search"
                    style="text-transform: uppercase;"
                    placeholder="Nombre Codigo" value="">
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
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Patente</th>
                <th>Tipo</th>
                <th>Descripción</th>
                <th style="width:15%">Editar - Eliminar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($mobiles as $mobile)
            <tr>
                <td>{{ $mobile->code }}</td>
                <td>{{ $mobile->name }}</td>
                <td>{{ $mobile->plate }}</td>
                <td>{{ $mobile->type }}</td>
                <td>{{ $mobile->description }}</td>
                <td class="d-flex align-items-center justify-content-center">
                    <a href="{{ route('samu.mobile.edit', $mobile) }}"><button type="button " class="btn btn-sm btn-warning mx-1"><i class="fas fa-edit"></i></button></a>
                    <form method="POST" action="{{ route('samu.mobile.destroy' , $mobile) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button " class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash-alt fa-lg"></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
