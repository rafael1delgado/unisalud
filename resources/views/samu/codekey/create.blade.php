@extends('layouts.app')

@section('content')
@include('nav')


<style>
 .button1{
     margin-top:30px;
     }
</style>
<form method="POST" action="{{ route('samu.codekey.store') }}">
    @csrf
    @method('POST')
        <div class="card mb-3">
            <div class="card-body">
        

                    <div class="col-md-6">
                        <h3 class="mb-3"><i class="fas fa-key"></i> Agregar Codificación de Clave</h3>
                    </div>
                    <hr>
                    <div class="form-row">
                
                        <fieldset class="form-group col-8 col-md-4">
                            <label for="for_run">Codigo </label>
                            <input type="Text" max="50000000" class="form-control" id="for_key_code" name="key_code" autocomplete="off"required>
                        </fieldset>

                        <fieldset class="form-group col-8 col-md-8">
                            <label for="for_run">Nombre </label>
                            <input type="Text" max="50000000" class="form-control" id="for_name_key_code" name="name_key_code" autocomplete="off" required>
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
