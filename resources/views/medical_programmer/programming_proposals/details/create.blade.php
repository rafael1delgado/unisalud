@extends('layouts.app')

@section('content')

<h3 class="mb-3">Crear Detalle</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.programming_proposal.details.store') }}">
@csrf
@method('POST')

@livewire('medical_programmer.select-activ-subactiv',['specialty_id' => $programmingProposal->specialty_id,
                                                      'profession_id' => $programmingProposal->profession_id])

<input type="hidden" name="programming_proposal_id" value="{{$programmingProposal->id}}">

<div class="row">
  <fieldset class="form-group col col-md">
      <label for="for_id_deis">Día</label>
      <select class="form-control" name="day" required>
        <option value=""></option>
        <option value="1">Lunes</option>
        <option value="2">Martes</option>
        <option value="3">Miercoles</option>
        <option value="4">Jueves</option>
        <option value="5">Viernes</option>
        <option value="6">Sábado</option>
        <option value="7">Domingo</option>
      </select>
  </fieldset>

  <fieldset class="form-group col col-md">
    <label for="for_id_deis">Hora de inicio</label>
    <input type="time" class="form-control" name="start_hour" value="" required>
  </fieldset>

  <fieldset class="form-group col col-md">
    <label for="for_id_deis">Hora de término</label>
    <input type="time" class="form-control" name="end_hour" value="" required>
  </fieldset>
</div>

<button type="submit" class="btn btn-primary">Crear</button>

</form>

@endsection

@section('custom_js')

@endsection
