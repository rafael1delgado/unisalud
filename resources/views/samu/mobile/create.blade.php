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
                <h3 class="mb-3"><i class="fas fa-plus"></i> Agregar Nuevo Movil</h3>
            </div>
            <hr>
            <div class="form-row">
        
                <fieldset class="form-group col-8 col-md-2">
                    <label for="for_run">Número de Amb </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="number" max="50000000" class="form-control" id="for_run" name="run" value="">
                </fieldset>

                <fieldset class="form-group col-12 col-md-4">
                    <label for="empresa">Tipo</label>
                    <select class="form-control" name="region_id" id="regiones">
                        <option>Seleccione Tipo</option>
                                    <option value="1" >Movil 1</option>
                                    <option value="2" >Movil  2</option>
                                    <option value="3" >Movil  3</option>
                                    <option value="4" >Movil  4</option>
                                    <option value="5" >Movil  5</option>
                                    <option value="3" >Movil  6</option>
                                    <option value="4" >Movil  7</option>
                                    <option value="5" >Movil  8</option>
                                    <option value="1" >Movil 9</option>
                                    <option value="2" >Movil  10</option>
                                    <option value="3" >Movil  11</option>
                                    <option value="4" >Movil  12</option>
                                    <option value="5" >Movil  13</option>
                                    <option value="3" >Movil  14</option>
                                    <option value="4" >Movil  15</option>
                                    <option value="5" >Movil  16</option>
                                </select>
                </fieldset>
                
                <fieldset class="form-group col-12 col-md-2">
                    <label for="empresa">Estado</label>
                    <select class="form-control" name="region_id" id="regiones">
                        <option>Seleccione Estado</option>
                                    <option value="1" >Activo</option>
                                    <option value="2" >Inactivo</option>
                                </select>
                </fieldset>

                <fieldset class="form-group col-12 col-md-4">
                    <label for="empresa">Detalle</label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="text"  class="form-control" id="for_run" name="run" value="">
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
    
        <div class="card mb-3">
    <div class="card-body">
   

            <div class="col-md-6">
                <h3 class="mb-3"><i class="fas fa-users"></i> Agregar Tripulación</h3>
            </div>
            <hr>
            <div class="form-row">
        
                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Conductor </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
                </fieldset>

                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Paramedico </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
                </fieldset>
                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Reanimador </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="Text" max="50000000" class="form-control" id="for_run" name="run" value="">
                </fieldset>
                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Observación </label>
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