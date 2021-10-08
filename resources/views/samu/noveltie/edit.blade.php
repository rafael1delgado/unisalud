@extends('layouts.app')

@section('content')
@include('nav')

<h3 class="mb-3"><i class="fas fa-book-reader"></i> Editar  Novedades </h3>
<!--inicio-->

<style>
 .button1{
     margin-top:30px;
     }
</style>

<form method="post" action="{{ route('samu.noveltie.update', $noveltie) }}">
    @csrf
    @method('PUT')

    <div class="card mb-3">
        <div class="card-body">
                <!-- registro de llamadas-->
                <h3><i class="fas fa-book"> Novedades</i></h3>
            <div class="form-row">
                    <div class="mb-3 col-md-11">
                        <textarea class="form-control" id="validationTextarea" name="detail"  placeholder="" required >{{ $noveltie->detail}}</textarea>
                        <div class="invalid-feedback ">
                        Ingrese las novedades del turno
                        </div>
                    </div>
                    <fieldset class="form-group col-md-1">
                        <label for="for_run"><br /> <br /><br /></label>
                        <button type="submit" class="btn btn-primary button mb-4" >Guardar</button>
                    </fieldset>
            </div>

            

        </div>
    </div>
</form>



@endsection
