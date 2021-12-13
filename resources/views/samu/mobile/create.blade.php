@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Agregar Móvil</h3>

<form action="{{route('samu.mobile.store')}}" method="post" autocomplete="off">
    @csrf
    @method('POST')

    <div class="form-row">
        <fieldset class="form-group col-8 col-md-4">
            <label for="for_mobile_code">Código</label>
            <input type="text" class="form-control" id="for_mobile_code" name="code" value="" required>
        </fieldset>

        <fieldset class="form-group col-8 col-md-4">
            <label for="for_name_mobile_code">Nombre </label>
            <input type="text" class="form-control" id="for_name_mobile_code" name="name" value="" required>
        </fieldset>
            <fieldset class="form-group col-8 col-md-4">
            <label for="for_name_mobile_plate">Patente </label>
            <input type="text" class="form-control" id="for_name_mobile_plate" name="plate" value="" required>
        </fieldset>
        <fieldset class="form-group col-8 col-md-4">
            <label for="for_name_mobile_type">Tipo </label>
            <input type="text" class="form-control" id="for_name_mobile_type" name="type" value="" required>
        </fieldset>
        <fieldset class="form-group col-8 col-md-4">
            <label for="for_name_mobile_type">Descripción</label>
            <input type="text"  class="form-control" id="for_name_mobile_description" name="description" value="" required>
        </fieldset>
        <div class="mt-5 form-check col-md-4">
            <input type="checkbox" class="form-check-input ml-3" name="managed" >
            <label class="form-check-label ml-5" for="exampleCheck1">Móvil Pertenece a Samu</label>
        </div>
        
    
    </div>

    <button type="submit" class="btn btn-primary">Crear</button>

    <a href="{{ route('samu.mobile.index') }}" class="btn btn-outline-secondary">Cancelar</a>
   
</form>
@endsection
