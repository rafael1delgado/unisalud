@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-blender-phone"></i> Editar Turno</h3>

<form action="{{route('samu.shift.update', $shift)}}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')

        <div class="form-row">

            <fieldset class="form-group col-md-2">
                <label for="for_type"><b>Tipo de Turno</b> </label>
                <select class="form-control" name="type" id="for_type">
                    <option value="Noche" {{($shift->type=='Noche')?'selected':''}}>Noche</option>
                    <option value="Largo" {{($shift->type=='Largo')?'selected':''}}>Largo</option>
                </select>
            </fieldset>

            <fieldset class="form-group col-md-2">
                <label for="for_opening_at"><i class="fas fa-clock"></i><b> Apertura de turno</b> </label>
                <input type="datetime-local" class="form-control" name="opening_at" id="for_opening_at" value="{{ $shift->opening_at->format('Y-m-d\TH:i:s') }}" required>
            </fieldset>

            <fieldset class="form-group col-md-2">
                <label for="for_closing_at"><i class="fas fa-clock"></i><b> Cierre de turno</b> </label>
                <input type="datetime-local" class="form-control" name="closing_at" id="for_closing_at" value="{{ optional($shift->closing_at)->format('Y-m-d\TH:i:s') }}">
            </fieldset>

            <fieldset class="form-group col-md-2">
                <label for="for_status">Estado</label>
                <select name="status" id="status" class="form-control" @if($openShift) disabled readonly @endif>
                    <option value="0" {{ ($shift->status === 0) ? 'selected' : '' }}>Cerrado</option>
                    <option value="1" {{ ($shift->status === 1) ? 'selected' : '' }}>Abierto</option>
                </select>
                @if($openShift)
                <div class="form-text">Ya existe un turno abierto.</div>
                @endif
                
            </fieldset>
            
        </div>

        <button type="submit" class="btn btn-primary button">Guardar</button>

        <a class="btn btn-outline-secondary" href="{{ route('samu.shift.index') }}">Cancelar</a>

</form>


@endsection