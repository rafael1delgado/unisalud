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
                <h3 class="mb-3"><i class="fas fa-ambulance"> <i class="fas fa-plus"></i> </i> Agregar Nuevo Movil</h3>
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
        
                <fieldset class="form-group col-8 col-md-2">
                    <label for="for_run">Movil </label>
                    <select class="form-control" name="mobile_id">
                        @foreach($mobiles as $mobile)
                            <option value="{{ $mobile->id }}">{{$mobile->name}}</option>
                        @endforeach
                    </select>
                </fieldset>
      
                <fieldset class="form-group col-12 col-md-2">
                    <label for="empresa">Tipo de  móvil</label>
                    <select class="form-control" name="type">
                        <option value="M1" {{ $mobile->type === 'M1' ? 'selected' : '' }} >M1</option>
                        <option value="M2" {{ $mobile->type ==='M2' ? 'selected' : ''}}>M2</option>
                        <option value="M3" {{$mobile->type ==='M3' ? 'selected' : ''}}>M3</option>
                        <option value="Hibrido" {{$mobile->type ==='Hibrido' ? 'selected': ''}}>Hibrido</option>
                        <option value="RU1" {{$mobile->type === 'RU1' ? 'selected' : ''}}>RU1</option>
                        <option value="RU2" {{mobile->type ==='RU2' ? 'selected' :''}}>RU2 </option>
                    </select>
                </fieldset>

             

                <fieldset class="form-group col-12 col-md-5">
                    <label for="empresa">Observación</label>
                    <textarea class="form-control" id="validationTextarea" name="detail" placeholder="" required></textarea>
                        <div class="invalid-feedback">
                                Ingrese Observaciones
                        </div>
                </fieldset>

    </div>

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