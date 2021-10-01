@extends('layouts.app')

@section('content')

<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">
        

    
    <h3 class="mb-3"><i class="fas fa-exclamation-circle"></i> PERTINENCIAS</h3>
        <div class="card border-success mb-3">
				<div class="card-header bg-success text-white">
                    N° INTERCONSULTA: 713
				</div>
				<div class="card-body">
                    <ul>
                        <li>Nombre:Alvaro Lupa</li>
                        <li>Edad: 29 Años</li>
                        <li>Género: Maculino</li>
                        <li>Centro: Cesfam Cirujano Aguirre</li>
                    </ul>
                </div>
        </div>

      
    <b>MOTIVO INTERCONSULTA</b>
    <li class="mb-3">Paciente presenta traumatismo en extremidad inferior derecha.</li>
    <div class="form-row">
        <fieldset class="form-group  col-md-12 mb-3">
            <label for="for_run"> <b>HIPOTESIS DIAGNOSTICA</b></label>
            <textarea class="form-control" placeholder="Ingrese Hipotesis Diagnostica" id="floatingTextarea2" style="height: 100px"></textarea>
        </fieldset>
        <fieldset class="form-group  col-md-12 mb-3">
             <label for="for_run"> <b>OBSERVACIÓN DEL CENTRO DE ORIGEN</b></label>
             <textarea class="form-control" placeholder="Ingrese Observación del Centro de Salud" id="floatingTextarea2" style="height: 100px"></textarea>
        </fieldset> 

        <fieldset class="form-group  col-md-4">
            <button type="button" class="btn btn-success mr-2">Pertinente</button>
        </fieldset> 
        <fieldset class="form-group  col-md-2">
            <button type="button" class="btn btn-danger mr-2 float-right">No pertinente</button>
        </fieldset> 
        <fieldset class="form-group  col-md-6">
        <label for="for_run"> <b>(Motivo)</b></label>
            <textarea class="form-control" placeholder="" id="floatingTextarea2" style="height: 100px"></textarea>
        </fieldset>
        <fieldset class="form-group  col-md-4 mb-3">
            <button type="submit" class="btn btn-primary button" >Terminar</button>
        </fieldset>
       
    </div>
    
            
          
    

    
     </div>
</div>



@endsection