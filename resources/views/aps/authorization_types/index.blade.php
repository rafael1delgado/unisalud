@extends('layouts.app')

@section('content')

<h2 class="mb-3">Tipos de autorización</h2>
<a class="btn btn-primary mb-2" href="{{ route('aps.authorization_types.create') }}">
    <i class="fas fa-plus"></i> Agregar
</a>


<table class="table table-sm table-borderer table-responsive-xl">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th>F.inicio</th>
            <th>F.Término</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach( $authorizationTypes as $authorizationType )
        <tr>
            <td>{{ $authorizationType->id }}</td>
            <td>{{ $authorizationType->name }}</td>
            <td>{{ $authorizationType->start_date->format('d-m-Y') }}</td>
            <td>{{ $authorizationType->end_date->format('d-m-Y') }}</td>
            <td>@if($authorizationType->status) Activo @else Desactivado @endif</td>
            <td>
      				<a href="{{ route('aps.authorization_types.edit', $authorizationType) }}"
      					class="btn btn-sm btn-outline-secondary">
      					<span class="fas fa-edit" aria-hidden="true"></span>
      				</a>
      				<form method="POST" action="{{ route('aps.authorization_types.destroy', $authorizationType) }}" class="d-inline">
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
