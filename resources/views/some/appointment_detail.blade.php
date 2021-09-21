@extends('layouts.app')

@section('content')

<h3 class="mb-3">Detalle de la cita</h3>

<div class="row">
    <fieldset class="form-group col-1">
        <label for="for_contract_id">Id</label>
        <input type="text" class="form-control" value="{{$appointment->id}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_contract_id">Estado</label>
        <input type="text" class="form-control" value="{{$appointment->status_text()}}" readonly >
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_contract_id">Tipo</label>
        <input type="text" class="form-control" value="{{$appointment->appointment_type_text()}}" readonly
        @if($appointment->status == "booked")
          @if($appointment->cod_con_appointment_type_id == 4)
            style="background-color: gray;color: white;"
          @else
            style="background-color: green;color: white;"
          @endif
        @else
          style="background-color: #519DF4;
          color: white;"
        @endif
        >
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

<div class="row">
  <fieldset class="form-group col">
      <label for="for_contract_id">Actividad</label>
      <input type="text" class="form-control" value="{{$appointment->programmingProposalDetail->activity->activity_name}}" readonly >
  </fieldset>

  <fieldset class="form-group col">
      <label for="for_contract_id">Sub-actividad</label>
      <input type="text" class="form-control" value="{{$appointment->programmingProposalDetail->subactivity->sub_activity_name}}" readonly >
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

  @if($appointment->users->count() > 0)

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

  @endif

  <div class="row">
      <fieldset class="form-group col-8">
          <label></label>
      </fieldset>

      <fieldset class="form-group col">
          <form method="GET" id="form" class="form-horizontal" action="{{ route('some.agenda') }}">
            @if($appointment->practitioners->first()->specialty_id != null)
              <input type="hidden" name="type" value="Médico">
            @else
              <input type="hidden" name="type" value="No médico">
            @endif
            <input type="hidden" name="specialty_id" value="{{$appointment->practitioners->first()->specialty_id}}">
            <input type="hidden" name="profession_id" value="">
            <input type="hidden" name="user_id" value="{{$appointment->practitioners->first()->user_id}}">
            <label for="for_sub_activity_id"></label>
            <button type="submit" class="form-control"><i class="fas fa-angle-double-left"></i> Volver</button>
          </form>
      </fieldset>
  </div>

@else

  <hr>

  <h4>Sin información</h4>

@endif

@endsection

@section('custom_js')

@endsection
