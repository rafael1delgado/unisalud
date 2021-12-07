@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="card mb-3">
    <div class="card-body">
   

            <div class="col-md-6">
                <h3 class="mb-3"><i class="fas fa-users"></i> Editar Tripulación</h3>
            </div>
            <hr>
            <div class="form-row">
        
                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Conductor </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="Mario Cortez">
                </fieldset>

                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Paramedico </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="Sofia Valencia">
                </fieldset>
                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Reanimador </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="Carlos Fuentes">
                </fieldset>
                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Medico </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="Marta Sanchez">
                </fieldset>

              
            </div>


            <hr>

            <div class="form-row">

                <fieldset class="form-group col-12 col-md-2 ">
                
                <button type="submit" class="btn btn-primary button" >Guardar</button>
     
                </fieldset>
            </div>

            
        </div>
     </div>
    





@endsection