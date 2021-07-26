@extends('layouts.app')

@section('content')

<h3 class="mb-3">Listado de Propuestas</h3>

<a class="btn btn-primary mb-3" href="{{ route('medical_programmer.programming_proposal.create') }}">
    <i class="fas fa-plus"></i> Agregar nueva
</a>

<table class="table table-sm table-borderer">
    <thead>
        <tr>
            <th>ID</th>
            <th>F.Solicitud</th>
            <th>Tipo</th>
            <th>Empleado</th>
            <th>Contrato</th>
            <th>Especialidad</th>
            <th>F.Inicio</th>
            <th>F.Término</th>
            <th>Estado</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
      @foreach($programmingProposals as $programmingProposal)
        <tr>
          <td>{{$programmingProposal->id}}</td>
          <td>{{$programmingProposal->request_date->format('d-m-Y')}}</td>
          <td>{{$programmingProposal->type}}</td>
          <td>{{$programmingProposal->user->OfficialFullName}}</td>
          <td>{{$programmingProposal->contract->law}} - {{$programmingProposal->contract->weekly_hours}}hrs</td>
          <td>{{$programmingProposal->specialty->specialty_name}}</td>
          <td>{{$programmingProposal->start_date->format('d-m-Y')}}</td>
          <td>{{$programmingProposal->end_date->format('d-m-Y')}}</td>
          <td>{{$programmingProposal->status}}</td>
          <td>
            <a href="{{ route('medical_programmer.programming_proposal.edit', $programmingProposal) }}"
              class="btn btn-sm btn-outline-secondary">
              <span class="fas fa-edit" aria-hidden="true"></span>
            </a>
            <form method="POST" action="{{ route('medical_programmer.programming_proposal.destroy', $programmingProposal) }}" class="d-inline">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
                <span class="fas fa-trash-alt" aria-hidden="true"></span>
              </button>
            </form>
          </td>
          </td>
        </tr>
      @endforeach
    </tbody>
</table>


@endsection

@section('custom_js')

@endsection
