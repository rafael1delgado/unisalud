@extends('layouts.app')

@section('content')

@include('samu.nav')

<form method="POST" action="{{ route('samu.key.store') }}">
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
                        <label for="for_key">Codigo </label>
                        <input type="text" class="form-control" id="for_key" name="key" autocomplete="off" required>
                    </fieldset>

                    <fieldset class="form-group col-8 col-md-8">
                        <label for="for_name">Nombre </label>
                        <input type="text" class="form-control" id="for_name" name="name" autocomplete="off" required>
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
