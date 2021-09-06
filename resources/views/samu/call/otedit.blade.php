@extends('layouts.app')

@section('content')

<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">

        <!-- seguimiento-->
        <h3 class="text-primary"><b> Orientación Telefónica<b></h3>
            
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <form method="GET" class="form-horizontal" action="">
                        <div class="input-group mb-sm-0">
                            <input class="form-control" type="text" name="search" autocomplete="off" id="for_search"
                                style="text-transform: uppercase;"
                                placeholder="QTC" value="" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
           
        <!-- inicio detalle OT-->
            <hr>
            <h4>Descipción de la Evaluación</h4>
        <div class="form-row">
                <div class=" col-md-12">
                <label for="for_run">Detalle de Orientacion Telefonica </label>
                    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="" required></textarea>
                    <div class="invalid-feedback">
                    Ingrese descripción
                    </div>
                </div>
               
            </div>
            <div class="form-row">
                    <fieldset class="form-group col-md-2 mt-3">
                        <label for="for_run"></label>
                        <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                    </fieldset>
             </div>
        </div>
        <!-- fin detalle OT-->
</div>
    </div>



@endsection