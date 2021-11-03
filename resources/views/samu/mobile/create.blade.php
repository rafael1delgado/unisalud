@extends('layouts.app')

@section('content')
@include('nav')

<style>
 .button1{
     margin-top:30px;
     }
</style>
<form action="{{route('samu.mobile.store')}}" method="post" autocomplete="off">
    @csrf
    @method('POST')
    <div class="card mb-3">
        <div class="card-body">    
            <div class="col-md-6">
                <h3 class="mb-3"><i class="fas fa-key"></i> Agregar Codificación de Movil</h3>
            </div>
            <hr>
            <div class="form-row">
                <fieldset class="form-group col-8 col-md-4">
                    <label for="for_mobile_code">Codigo </label>
                    <input type="Text" max="50000000" class="form-control" id="for_mobile_code" name="code" value="" required>
                </fieldset>
    
                <fieldset class="form-group col-8 col-md-4">
                    <label for="for_name_mobile_code">Nombre </label>
                    <input type="Text" max="50000000" class="form-control" id="for_name_mobile_code" name="name" value="" required>
                </fieldset>
                 <fieldset class="form-group col-8 col-md-4">
                    <label for="for_name_mobile_plate">Patente </label>
                    <input type="Text" max="50000000" class="form-control" id="for_name_mobile_plate" name="plate" value="" required>
                </fieldset>
                <fieldset class="form-group col-8 col-md-4">
                    <label for="for_name_mobile_type">Tipo </label>
                    <input type="Text" max="50000000" class="form-control" id="for_name_mobile_type" name="type" value="" required>
                </fieldset>
                <fieldset class="form-group col-8 col-md-4">
                    <label for="for_name_mobile_type">Descripción</label>
                    <input type="int" max="50000000" class="form-control" id="for_name_mobile_description" name="description" value="" required>
                </fieldset>
                <div class="mt-5 form-check col-md-4">
                    <input type="checkbox" class="form-check-input ml-3" name="managed" >
                    <label class="form-check-label ml-5" for="exampleCheck1">Movil Pertenece a Samu</label>
                </div>
            </div>
            <hr>
            <div class="form-row">
                <fieldset class="form-group col-12 col-md-2 ">
                    <button type="submit" class="btn btn-primary button" >Guardar</button>
                </fieldset>
            </div>
        </div>
    </div>
</form>
@endsection
