@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Editar Móvil</h3>

<form action="{{route('samu.mobile.update', $mobile)}}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')

    <div class="form-row">

        <fieldset class="form-group col-8 col-md-4">
            <label for="for_mobile_code">Código </label>
            <input type="text" class="form-control" id="for_mobile_code" name="code" value="{{ $mobile->code }}">
        </fieldset>

        <fieldset class="form-group col-8 col-md-4">
            <label for="for_name_mobile_code">Nombre </label>
            <input type="text" class="form-control" id="for_name_mobile_code" name="name" value="{{ $mobile->name}}">
        </fieldset>
        <fieldset class="form-group col-8 col-md-4">
            <label for="for_name_mobile_plate">Patente </label>
            <input type="text" class="form-control" id="for_name_mobile_plate" name="plate" value="{{ $mobile->plate}}" required>
        </fieldset>
        <fieldset class="form-group col-8 col-md-3">
            <label for="for_type">Tipo de  móvil</label>
            <select class="form-control" name="type" required>
                <option value="M1" {{ $mobile->type === 'M1' ? 'selected' : '' }}>M1</option>
                <option value="M2" {{ $mobile->type ==='M2' ? 'selected' : ''}}>M2</option>
                <option value="M3" {{ $mobile->type ==='M3' ? 'selected' : ''}}>M3</option>
                <option value="Hibrido" {{ $mobile->type ==='Hibrido' ? 'selected': ''}}>Hibrido</option>
                <option value="RU1" {{ $mobile->type === 'RU1' ? 'selected' : ''}}>RU1</option>
                <option value="RU2" {{ $mobile->type ==='RU2' ? 'selected' :''}}>RU2 </option>
            </select>
        </fieldset>
        <fieldset class="form-group col-8 col-md-5">
            <label for="for_name_mobile_type">Descripción</label>
            <input type="text" class="form-control" id="for_name_mobile_description" name="description" value="{{ $mobile->description}}" required>
        </fieldset>
        <div class="mt-5 form-check col-md-2">
            <input type="checkbox" class="form-check-input ml-3" name="managed" {{ ($mobile->managed) ? 'checked':''}} >
            <label class="form-check-label ml-5" for="exampleCheck1">Móvil Pertenece a Samu</label>
        </div>
        <div class="mt-5 form-check col-md-1">
            <input type="checkbox" class="form-check-input ml-3" name="status" {{ ($mobile->status) ? 'checked':''}} >
            <label class="form-check-label ml-5" for="exampleCheck1">Activo</label>
        </div>
        
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ route('samu.mobile.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>
    





@endsection