@extends('layouts.app')

@section('content')

<h3 class="mb-3">Listado de Locaciones</h3>

<a class="btn btn-primary mb-3" href="{{ route('some.locations.create') }}">
    <i class="fas fa-plus"></i> Agregar nueva Locación
</a>

<table class="table table-sm table-borderer">
    <thead>
        <tr>
            <th>Id</th>
            <th>Estado</th>
            <th>Nombre Locación</th>
            <th>Alias</th>
            <th>Descripción</th>
            <th>Organización</th>
        </tr>
    </thead>
    <tbody>
        @foreach( $locations as $location )
        <tr>
            <td>{{ $location->id ?? ''}}</td>
            <td>{{ $location->status ?? ''}}</td>
            <td>{{ $location->name ?? ''}}</td>
            <td>{{ $location->alias ?? ''}}</td>
            <td>{{ $location->description ?? ''}}</td>
            <td>{{ $location->organization->name ?? ''}}</td>
            <td>
      				<a href="{{ route('some.locations.edit', $location) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('some.locations.destroy', $location) }}" class="d-inline">
      					@csrf
      					@method('DELETE')
      					<button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
      						<span class="fas fa-trash-alt" aria-hidden="true"></span>
      					</button>
      				</form>
      			</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

@section('custom_js')

@endsection
