@extends('layouts.app')

@section('content')

<h3 class="mb-3">Detalle de la cita</h3>

<div class="row">
    <fieldset class="form-group col-3">
        <label for="for_contract_id">Id</label>
        <input type="text" class="form-control" value="{{$appointment->id}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_contract_id">Fecha de inicio</label>
        <input type="text" class="form-control" value="{{$appointment->start->format('d-m-Y H:i')}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_contract_id">Fecha de término</label>
        <input type="text" class="form-control" value="{{$appointment->end->format('d-m-Y H:i')}}" readonly >
    </fieldset>
</div>

@if($appointment->appointables->count() > 0)

  <hr>

  <h4>Profesional</h4>

  <div class="row">

    <fieldset class="form-group col">
        <label for="for_contract_id">Especialidad</label>
        <input type="text" class="form-control" value="{{$appointment->practitioners->first()->specialty->specialty_name}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_contract_id">Nombre</label>
        <input type="text" class="form-control" value="{{$appointment->practitioners->first()->user->OfficialFullName}}" readonly >
    </fieldset>
  </div>

  <hr>

  <h4>Paciente</h4>

  <div class="row">

      <fieldset class="form-group col-3">
          <label for="for_contract_id">Rut</label>
          <input type="text" class="form-control" value="{{$appointment->users->first()->IdentifierRun->value}}" readonly >
      </fieldset>

      <fieldset class="form-group col-1">
          <label for="for_contract_id">Rut</label>
          <input type="text" class="form-control" value="{{$appointment->users->first()->IdentifierRun->dv}}" readonly >
      </fieldset>

      <fieldset class="form-group col">
          <label for="for_contract_id">Nombre</label>
          <input type="text" class="form-control" value="{{$appointment->users->first()->OfficialFullName}}" readonly >
      </fieldset>

  </div>

@else

  <hr>

  <h4>Sin información</h4>

@endif

@endsection

@section('custom_js')

@endsection
