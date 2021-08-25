@extends('layouts.app')

@section('content')

<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">
   

            <div class="col-md-6">
                <h3 class="mb-3"><i class="fas fa-key"></i> Agregar Codificación de Calve</h3>
            </div>
            <hr>
            <div class="form-row">
        
                <fieldset class="form-group col-8 col-md-4">
                    <label for="for_run">Codigo </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
                </fieldset>

                <fieldset class="form-group col-8 col-md-8">
                    <label for="for_run">Nombre </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
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
