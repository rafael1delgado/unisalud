@extends('layouts.app')

@section('content')

<h3 class="mb-3">Nueva Observación</h3>

<form method="POST" class="form-horizontal" action="{{ route('some.observations.store') }}">
    @csrf
    @method('POST')

    <div class="form-row">
        <fieldset class="form-group col-6 col-md-3">
            <label for="for_description">Observaciones</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required>
        </fieldset>
        <fieldset class="form-group col-6 col-md-3">
        <label for="for_status">Estado de observación</label>
        <select id="for_status" name="status" class="form-control" required>
                <option></option>
                <option value="registered" {{old('status') === 'registered'? 'selected' : ''}}>Registrado</option>
                <option value="preliminar" {{old('status') === 'preliminar'? 'selected' : ''}}>Preliminar</option>
                <option value="final" {{old('status') === 'final'? 'selected' : ''}}>Final</option>
                <option value="amended" {{old('status') === 'amended'? 'selected' : ''}}>Modificada</option>
                <option value="corrected" {{old('status') === 'corrected'? 'selected' : ''}}>Corregida</option>
                <option value="cancelled" {{old('status') === 'cancelled'? 'selected' : ''}}>Cancelada</option>
                <option value="entered-in-error" {{old('status') === 'entered-in-error'? 'selected' : ''}}>Ingresado por error</option>
                <option value="unknown" {{old('status') === 'unknown'? 'selected' : ''}}>Desconocido</option>
            </select> 
        </fieldset> 
        <fieldset class="form-group col-6 col-md-3">
        <label for="for_type">Tipo de observación</label>
        <select id="for_type" name="type" class="form-control" required>
                <option></option>
                <option value="doctor" {{old('type') === 'doctor'? 'selected' : ''}}>Medico</option>
                <option value="patient" {{old('type') === 'patient'? 'selected' : ''}}>Paciente</option>
            </select> 
        </fieldset>
        <fieldset class="form-group col-6 col-md-3">
            <label for="for_cod_con_obs_categories_id">Categoría</label>
            <select name="cod_con_obs_categories_id" id="for_cod_con_obs_categories_id" class="form-control" required>
            <option value=""></option>
            @foreach($obsCategory as $obsCategory)
                <option value="{{ $obsCategory->id }}" {{(old('cod_con_obs_categories_id') == $obsCategory->id) ? 'selected' : ''}}>{{ $obsCategory->text }}</option>
            @endforeach
            </select>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection