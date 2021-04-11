@extends('layouts.app')

@section('title', 'Permisos')

@section('content')

<h3 class="mb-3">Permisos</h3>

<a class="btn btn-primary mb-3" href="{{ route('parameter.permission.create') }}">Crear</a>

<table class="table table-sm">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach($permissions as $permission)
        <tr>
            <td>{{ $permission->id }}</td>
            <td>{{ $permission->name }}</td>
            <td>{{ $permission->description }}</td>
            <td>
                <a href="{{ route('parameter.permission.edit', $permission->id )}}"><span data-feather="edit"></span></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>


@endsection

@section('custom_js')

@endsection
