@extends('layouts.app')

@section('content')
@include('nav')

<style>
    .button1{
     margin-top:30px;
    }
</style>

<div class="card mb-3">
    <div class="card-body">
    
        <div class="col-md-6">
            <h3 class="mb-3"><i class="fas fa-ambulance"> <i class="fas fa-plus"></i> </i> Asinga un móvil a un turno</h3>
        </div>
        
        <hr>
        
        <form method="POST" action="{{ route('samu.mobile.store') }}">
            @csrf
            @method('POST')
         
            <div class="form-row">
                <fieldset class="form-group  col-md-3">
                    <label for="for_return">Turno</label>
                    <select class="form-control" name="shift_id">
                        @foreach($shifts as $shift)
                            <!--de la varible que traigo el campo que quiero guaradar - lo que quiero mostrar del As del foreach-->
                            <option value="{{ $shift->id }}">{{$shift->date}}  - {{$shift->type}} </option>
                        @endforeach          
                    </select> 
                                        
                </fieldset>
        
                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Movil </label>
                    <select class="form-control" name="mobile_id">
                        @foreach($mobiles as $mobile)
                            <option value="{{ $mobile->id }}">{{$mobile->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
      
                <fieldset class="form-group col-12 col-md-2">
                    <label for="empresa">Estado del móvil</label>
                    <select class="form-control" name="type">
                        <option value="1">Activo</option>
                        <option value="o">Inactivo</option>
                    </select>
                </fieldset>
                

                <fieldset class="form-group col-12 col-md-4">
                    <label for="empresa">Observación</label>
                    <textarea class="form-control" id="validationTextarea" name="detail" placeholder="" required></textarea>
                        <div class="invalid-feedback">
                                Ingrese Observaciones
                        </div>
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
    </form>
        
            
        </div>
     </div>

@endsection
@section('custom_js')
<!--para que los popover solo duren 3 segundos-->
<script>
$(function () {
        $('[data-toggle="popover" ]').popover()
    })
</script>
@endsection