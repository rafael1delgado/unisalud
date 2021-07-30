@extends('layouts.app')

@section('content')

<h3 class="mb-3">Editar Localización</h3>

<form method="POST" class="form-horizontal" action="{{ route('some.observations.update', $observation) }}">
    @csrf
    @method('PUT')
    <div class="row">
        <fieldset class="form-group col">
            <label for="for_description">Descripción</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required value="{{$observation->description}}">
        </fieldset>
        <fieldset class="form-group col">
        <label for="for_status">Estado de observación</label>
        <select id="for_status" name="status" class="form-control" required>
                <option></option>
                <option value="registered" {{$observation->status === $observation->status ? 'selected' : ''}}>Registrado</option>
                <option value="preliminar" {{$observation->status === $observation->status ? 'selected' : ''}}>Preliminar</option>
                <option value="final" {{$observation->status === $observation->status ? 'selected' : ''}}}>Final</option>
                <option value="amended" {{$observation->status === $observation->status ? 'selected' : ''}}>Modificada</option>
                <option value="corrected" {{$observation->status === $observation->status ? 'selected' : ''}}>Corregida</option>
                <option value="cancelled" {{$observation->status === $observation->status ? 'selected' : ''}}>Cancelada</option>
                <option value="entered-in-error" {{$observation->status === $observation->status ? 'selected' : ''}}>Ingresado por error</option>
                <option value="unknown" {{$observation->status === $observation->status ? 'selected' : ''}}>Desconocido</option>
            </select> 
        </fieldset> 
        <fieldset class="form-group col">
        <label for="for_type">Tipo de observación</label>
        <select id="for_type" name="type" class="form-control" required>
                <option></option>
                <option value="doctor" {{$observation->type === $observation->type ? 'selected' : ''}}>Medico</option>
                <option value="patient" {{$observation->type === $observation->type ? 'selected' : ''}}>Paciente</option>
            </select> 
        </fieldset>
        <fieldset class="form-group col-md-3">
            <label for="for_cod_con_obs_categories_id">Categoría</label>
            <select name="cod_con_obs_categories_id" id="for_cod_con_obs_categories_id" class="form-control" required>
            <option value=""></option>
            @foreach($obsCategory as $obsCategory)
                <option value="{{ $obsCategory->id }}" {{$obsCategory->cod_con_obs_categories_id === $obsCategory->cod_con_obs_categories_id ? 'selected' : '' }}>{{ $obsCategory->text }}</option>
            @endforeach
            </select>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Actualizar</button>


</form>

@canany(['administrador'])
    <br /><hr />
    <div style="height: 300px; overflow-y: scroll;">
        @include('partials.audit', ['audits' => $observation->audits] )
    </div>
@endcanany

@endsection

@section('custom_js')

@endsection