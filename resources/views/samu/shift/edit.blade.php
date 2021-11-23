@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-blender-phone"></i> Editar Turno</h3>

<form action="{{route('samu.shift.update', $shift)}}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')

        <div class="form-row">

            <fieldset class="form-group col-md-2">
                <label for="for_date"><b>Fecha de registro</b> </label>
                <input type="date" class="form-control" name="date" id="for_date" value="{{ date_format($shift->created_at,"Y-m-d") }}">
            </fieldset>

            <fieldset class="form-group col-md-2">
                <label for="for_type"><b>Tipo de Turno</b> </label>
                <select class="form-control" name="type" id="for_type">
                    <option value="Noche" {{($shift->type=='Noche')?'selected':''}}>Noche</option>
                    <option value="Largo" {{($shift->type=='Largo')?'selected':''}}>Largo</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-md-2">
                <label for="for_opening_time"><i class="fas fa-clock"></i><b> Hora Apertura de turno</b> </label>
                <input type="time" class="form-control" name="opening_time" id="for_opening_time" value="{{$shift->opening_time}}">
            </fieldset>
        </div>

        <button type="submit" class="btn btn-primary button">Guardar</button>

        <a class="btn btn-outline-secondary" href="{{ route('samu.shift.index') }}">Cancelar</a>

</form>


@endsection