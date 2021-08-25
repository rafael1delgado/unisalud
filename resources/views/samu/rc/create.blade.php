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
                <h3 class="mb-3"><i class="fas fa-blender-phone"></i> Agregar Centro Regulador</h3>
            </div>
            <hr>
            <div class="form-row">
        
                <fieldset class="form-group col-8 col-md-4">
                    <label for="for_run">Jefe de Turno</label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
                </fieldset>

                <fieldset class="form-group col-8 col-md-4">
                    <label for="for_run">Medico Regulador </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
                </fieldset>
                <fieldset class="form-group col-8 col-md-4">
                    <label for="for_run">Enfermera Reguladora </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
                </fieldset>
              
            </div>
            
            <div class="form-row">
                <div class="col-12 col-md-4 mb-3">
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaloperador">
                        <i class="fas fa-plus"></i> Agregar Operador
                    </a>
                </div>
                <!--inicio modal operador-->
                <div class="modal fade" id="modaloperador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agegar Operador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         
                        <fieldset class="form-group col-12 col-md-12">
                        <label for="for_run">Nombre del Operador </label>
                        <input type="hidden" class="form-control" id="for_id" name="id" value="">
                        <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- fin modal operador-->

                <div class="col-12 col-md-4 mb-3">
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modaldespachador">
                        <i class="fas fa-plus"></i> Agregar Despachador
                    </a>
                </div>

                       <!--inicio modal despachador-->
                       <div class="modal fade" id="modaldespachador" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Agegar Despachador</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                         
                        <fieldset class="form-group col-12 col-md-12">
                        <label for="for_run">Nombre del Despachador </label>
                        <input type="hidden" class="form-control" id="for_id" name="id" value="">
                        <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
                        </fieldset>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- fin modal despachador-->

            </div>   
            <hr>

            <fieldset class="form-group col-12 col-md-2  ">
                
                <button type="submit" class="btn btn-primary button " >Guardar</button>
     
                </fieldset>


           


            
        </div>
     </div>
    





@endsection