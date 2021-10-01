@extends('layouts.app')

@section('content')

<style>
 .button1{
     margin-top:30px;
     }
</style>
<form action="{{route('samu.codemobile.update', $codeMobile)}}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="card mb-3">
        <div class="card-body">
            <div class="col-md-6">
            <h3 class="mb-3"><i class="fas fa-key"></i> Editar Codificación de Movil</h3>
            </div>
            <hr>
            <div class="form-row">
        
                <fieldset class="form-group col-8 col-md-4">
                    <label for="for_mobile_code">Codigo </label>
                    <input type="Text" max="50000000" class="form-control" id="for_mobile_code" name="mobile_code" value="{{ $codeMobile->mobile_code }}">
                </fieldset>
    
                <fieldset class="form-group col-8 col-md-8">
                    <label for="for_name_mobile_code">Nombre </label>
                    <input type="Text" max="50000000" class="form-control" id="for_name_mobile_code" name="name_mobile_code" value="{{ $codeMobile->name_mobile_code }}">
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
    





@endsection