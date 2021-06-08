@extends('layouts.app')

@section('content')

<h3 class="mb-3">Listado de RRHH</h3>

<a class="btn btn-primary mb-3" href="{{ route('medical_programmer.rrhh.create') }}">
    <i class="fas fa-plus"></i> Agregar nuevo
</a>

<table class="table table-sm table-borderer">
    <thead>
        <tr>
            <th>RUT</th>
            <th>DV</th>
            <th>Nombre</th>
            <!-- <th>Apellido Paterno</th>
            <th>Apellido Materno</th> -->
            <th>Función</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $rrhh as $people)
        <tr>
            <td>{{ $people->IdentifierRun->value }}</td>
            <td>{{ $people->IdentifierRun->dv }}</td>
            <td>{{ $people->OfficialFullName }}</td>
            <!-- <td>{{ $people->fathers_family }}</td>
            <td>{{ $people->mothers_family }}</td> -->
            <td>{{ $people->job_title }}</td>
            <td>
      				<a href="{{ route('medical_programmer.rrhh.edit', $people) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('medical_programmer.rrhh.destroy', $people) }}" class="d-inline">
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
