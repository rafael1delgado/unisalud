@extends('layouts.app')

@section('content')

<h3 class="mb-3">Detalle del evento</h3>

<div class="row">
    <fieldset class="form-group col">
        <label for="for_start_date">Rut</label>
        <input type="text" class="form-control" id="for_start_date" name="start_date" required value="{{$theoreticalProgramming->rut}}" disabled>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_id">Nombre</label>
        <input type="text" class="form-control" id="for_id" name="name" required value="{{$theoreticalProgramming->rrhh->getFullNameAttribute()}}" disabled>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_id">Especialidad/Profesión</label>
        <input type="text" class="form-control" id="for_id" name="name" required
        @if($theoreticalProgramming->specialty)
          value="{{$theoreticalProgramming->specialty->specialty_name}}"
        @else
          value="{{$theoreticalProgramming->profession->profession_name}}"
        @endif
        disabled>
    </fieldset>
</div>

<div class="row">
    <fieldset class="form-group col">
        <label for="for_id">Id del evento</label>
        <input type="text" class="form-control" id="for_id" name="id" required value="{{$theoreticalProgramming->id}}" disabled>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_start_date">Fecha de inicio</label>
        <input type="text" class="form-control" id="for_start_date" name="start_date" required value="{{$theoreticalProgramming->start_date}}" disabled>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_end_date">Fecha de término</label>
        <input type="text" class="form-control" id="for_end_date" placeholder="" name="end_date" required value="{{$theoreticalProgramming->end_date}}" disabled>
    </fieldset>
</div>

<div class="row">
    <fieldset class="form-group col">
        <label for="for_contract_id">Contrato</label>
        <input type="text" class="form-control" id="for_contract_id" name="contract_id" required value="{{$theoreticalProgramming->contract->contract_id}}" disabled>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_id">Actividad</label>
        <input type="text" class="form-control" id="for_id" name="id" required value="{{$theoreticalProgramming->activity->activity_name}}" disabled>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_sub_activity_id">Subactividad</label>
        <select name="sub_activity_id" id="for_sub_activity_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
            <option></option>
            @foreach($subactivities as $subactivity)
              <option value="{{$subactivity->id}}">{{$subactivity->sub_activity_abbreviated}} - {{$subactivity->sub_activity_name}}</option>
            @endforeach
        </select>
    </fieldset>
</div>

<div class="row">
    <fieldset class="form-group col-4">
        <label></label>
    </fieldset>

    <fieldset class="form-group col-4">
        <label for="for_sub_activity_id"></label>
        <select name="sub_activity_id" id="for_sub_activity_id" class="form-control selectpicker" required="" data-live-search="true" data-size="5">
            <option>Esta semana</option>
            <option>Todas las semanas</option>
            <option>Semana volante</option>
        </select>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_sub_activity_id"></label>
        <button type="submit" class="form-control btn btn-primary">Guardar</button>
    </fieldset>

    <fieldset class="form-group col">
        <label for="for_sub_activity_id"></label>
        <button type="submit" class="form-control btn btn-danger">Eliminar</button>
    </fieldset>
</div>


@endsection

@section('custom_js')

@endsection
