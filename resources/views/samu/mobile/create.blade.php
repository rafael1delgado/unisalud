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
        
                <fieldset class="form-group col-8 col-md-3">
                    <label for="for_run">Movil </label>
                    <select class="form-control" name="mobile_id">
                        @foreach($codemobiles as $codemobile)
                            <option value="{{ $codemobile->id }}">{{$codemobile->name_mobile_code}}</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="form-group col-12 col-md-2">
                    <label for="empresa">Tipo</label>
                    <select class="form-control" name="type">

                                
                                <option value="M 1" {{ $shiftMobiles->first()->type === 'M 1' ? 'selected' : '' }}>M 1</option>
                                <option value="M 2" {{ $shiftMobiles->first()->type === 'M 2' ? 'selected' : '' }}>M 2</option>
                                <option value="M 3" {{ $shiftMobiles->first()->type === 'M 3' ? 'selected' : '' }}>M 3</option>
                                <option value="Hibrido" {{ $shiftMobiles->first()->type === 'Hibrido' ? 'selected' : '' }}>Hibrido</option>
                                <option value="RU 1" {{ $shiftMobiles->first()->type === 'RU 1' ? 'selected' : '' }}>RU 1</option>
                                <option value="RU 2" {{ $shiftMobiles->first()->type === 'RU 2' ? 'selected' : '' }}>RU 2</option>
                    
                    </select>
                </fieldset>
                

                <fieldset class="form-group col-12 col-md-4">
                    <label for="empresa">Detalle</label>
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