@extends('layouts.app')

@section('content')

<h3 class="mb-3">Listado de Observaciones</h3>

<a class="btn btn-primary mb-3" href="{{ route('some.observations.create') }}">
    <i class="fas fa-plus"></i> Agregar nueva Observación
</a>

<table class="table table-sm table-borderer">
    <thead>
        <tr>
            <th>Id</th>
            <th>Descripción</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $observations as $observation )
        <tr>
            <td>{{ $observation->id }}</td>
            <td>{{ $observation->description }}</td>
            <td>
      				<a href="{{ route('some.observations.edit', $observation) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('some.observations.destroy', $observation) }}" class="d-inline">
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
