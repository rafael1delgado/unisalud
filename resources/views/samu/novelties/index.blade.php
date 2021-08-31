@extends('layouts.app')

@section('content')
@include('nav')

<h3 class="mb-3"><i class="fas fa-book-reader"></i> Registro de Novedades del turno</h3>
<!--inicio-->

<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">
            <!-- registro de llamadas-->
            <h3><i class="fas fa-book"> Novedades</i></h3>
           <div class="form-row">
                <div class="mb-3 col-md-10">
                    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="" required></textarea>
                    <div class="invalid-feedback">
                    Ingrese las novedades del turno
                    </div>
                </div>
                <fieldset class="form-group col-md-2">
                    <label for="for_run"><br /> <br /><br /></label>
                    <button type="submit" class="btn btn-primary button mb-4" >Guardar</button>
                </fieldset>
           </div>
                <!-- fin de registro de llamadas-->
        
          <!--estado de las personas en turno
                ambulancias por turno
                centro regulador por turno-->

    </div>
</div>



@endsection
