@extends('layouts.app')

@section('content')

<h3 class="mb-3">Detalle del evento</h3>

<form method="POST" class="form-horizontal" action="{{ route('medical_programmer.theoretical_programming.editMyEvent', $theoreticalProgramming) }}">
@csrf
@method('POST')

<input type="hidden" name="url" value="{{url()->previous()}}">
<div class="row">
    <fieldset class="form-group col">
        <label for="for_start_date">Rut</label>
        <input type="text" class="form-control" id="for_start_date" name="start_date" required value="{{$theoreticalProgramming->user->IdentifierRun->value}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_id">Nombre</label>
        <input type="text" class="form-control" id="for_id" name="name" required value="{{$theoreticalProgramming->user->OfficialFullName}}" readonly>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_id">Especialidad/Profesión</label>
        <input type="text" class="form-control" id="for_id" name="name" required
        @if($theoreticalProgramming->specialty)
          value="{{$theoreticalProgramming->specialty->specialty_name}}"
        @else
          value="{{$theoreticalProgramming->profession->profession_name}}"
        @endif
        readonly >
    </fieldset>
</div>

<div class="row">
    <fieldset class="form-group col">
        <label for="for_id">Id del evento</label>
        <input type="text" class="form-control" id="for_id" name="id" required value="{{$theoreticalProgramming->id}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_start_date">Fecha de inicio</label>
        <input type="text" class="form-control" id="for_start_date" name="start_date" required value="{{$theoreticalProgramming->start_date}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_end_date">Fecha de término</label>
        <input type="text" class="form-control" id="for_end_date" placeholder="" name="end_date" required value="{{$theoreticalProgramming->end_date}}" readonly >
    </fieldset>
</div>

<div class="row">
    <fieldset class="form-group col">
        <label for="for_contract_id">Contrato</label>
        <input type="text" class="form-control" id="for_contract_id" name="contract_id" required value="{{$theoreticalProgramming->contract->contract_id}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_activity_name">Actividad</label>
        <input type="text" class="form-control" id="for_activity_name" name="activity_name" required value="{{$theoreticalProgramming->activity->activity_name}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_sub_activity_id">Subactividad</label>
        <select name="sub_activity_id" id="for_sub_activity_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
            <option></option>
            @foreach($subactivities as $subactivity)
              <option value="{{$subactivity->id}}" {{ $subactivity->id == $theoreticalProgramming->sub_activity_id ? 'selected' : '' }}>{{$subactivity->sub_activity_abbreviated}} - {{$subactivity->sub_activity_name}}</option>
            @endforeach
        </select>
    </fieldset>
</div>

<div class="row">
    <fieldset class="form-group col-4">
        <label></label>
    </fieldset>

    <fieldset class="form-group col-4">
        <label for="for_action"></label>
        <select name="action" id="for_action" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
            <option>Esta semana</option>
            <option>Todas las semanas</option>
            <option>Semana volante</option>
        </select>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_sub_activity_id"></label>
        <button type="submit" class="form-control btn btn-primary" onclick="return confirm('¿Está seguro de guardar la información?');">Guardar</button>
    </fieldset>

    </form>

    <form method="POST" id="deleteForm" class="form-horizontal" action="{{ route('medical_programmer.theoretical_programming.deleteMyEventId', $theoreticalProgramming) }}">
    @csrf
    @method('POST')

    <input type="hidden" class="form-control" name="id" value="{{$theoreticalProgramming->id}}">
    <input type="hidden" name="url" value="{{url()->previous()}}">
    <input type="hidden" class="form-control" name="action" id="deleteAction">

    <fieldset class="form-group col">
        <label for="for_sub_activity_id"></label>
        <button type="button" class="form-control btn btn-danger" id="btn_eliminar">Eliminar</button>
    </fieldset>

    </form>

    <fieldset class="form-group col">
        <label for="for_sub_activity_id"></label>
        <button type="button" class="form-control" id="btn_eliminar"><i class="fas fa-angle-double-left"></i>Volver</button>
    </fieldset>
</div>

@endsection

@section('custom_js')

<script>

$( "#btn_eliminar" ).click(function() {
  $('#deleteAction').val($('#for_action').val());
  if (confirm('¿Está seguro de eliminar el evento?')) {
      document.getElementById('deleteForm').submit();
  }
});

</script>

@endsection
