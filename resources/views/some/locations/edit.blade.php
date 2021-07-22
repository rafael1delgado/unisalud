@extends('layouts.app')

@section('content')

<h3 class="mb-3">Editar Localización</h3>

<form method="POST" class="form-horizontal" action="{{ route('some.locations.update', $location) }}">
    @csrf
    @method('POST')

    <div class="row">
    <fieldset class="form-group col">
        <label for="for_status">Estado</label>
        <select id="for_status" name="status" class="form-control" required>
                <option></option>
                <option value="active" {{old('status') === 'active'? 'selected' : ''}}>Activo</option>
                <option value="suspended" {{old('status') === 'suspended'? 'selected' : ''}}>Suspendido</option>
                <option value="inactive" {{old('status') === 'inactive'? 'selected' : ''}}>Inactivo</option>
            </select> 
        </fieldset>           

        <fieldset class="form-group col">
            <label for="for_description">Nombre Locación</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="name" required value="{{$location->name}}">
        </fieldset>           

        <fieldset class="form-group col">
            <label for="for_description">Alias</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="alias" required value="{{$location->alias}}">
        </fieldset>           
    </div>

    <div class="row">
        <fieldset class="form-group col col-md-4">
        <label for="for_description">Descripción</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="description" required value="{{$location->description}}">
        </fieldset>

        <fieldset class="form-group col-md-3">
            <label for="for_cod_con_organization_id">Organizacion</label>
            <select name="organization_id" id="for_cod_con_organization_id" class="form-control" required>
            <option value=""></option>
            @foreach($organization as $organization)

                <option value="{{ $organization->id }}" {{$organization->id === $organization->organization_id ? 'selected' : '' }}>{{ $organization->name }}</option>
            @endforeach
            </select>
        </fieldset>
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

</form>

@canany(['administrador'])
    <br /><hr />
    <div style="height: 300px; overflow-y: scroll;">
        @include('partials.audit', ['audits' => $location->audits] )
    </div>
@endcanany

@endsection

@section('custom_js')

@endsection