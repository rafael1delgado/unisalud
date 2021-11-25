@extends('layouts.app')

@section('content')

@include('samu.nav')  

<h3 class="mb-3"><i class="fas fa-ambulance"> <i class="fas fa-plus"></i> </i> Asinga un móvil a un turno</h3>

<form method="POST" action="{{ route('samu.mobileinservice.store') }}">
    @csrf
    @method('POST')
    
    <div class="form-row">
        
        <fieldset class="form-group col-8 col-md-3">
            <label for="for_run">Movil </label>
            <select class="form-control" name="mobile_id">
            <option></option>
                @foreach($mobiles as $mobile)
                    <option value="{{ $mobile->id }}">{{$mobile->name}}</option>
                @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-12 col-md-3">
            <label for="empresa">Tipo de  móvil</label>
            <select class="form-control" name="type">
                <option value=""></option>
                <option value="M1">M1</option>
                <option value="M2">M2</option>
                <option value="M3">M3</option>
                <option value="Hibrido">Hibrido</option>
                <option value="RU1">RU1</option>
                <option value="RU2" >RU2</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-12 col-md-6">
            <label for="empresa">Observación</label>
            <textarea class="form-control" id="validationTextarea" name="observation" placeholder="" required></textarea>
                <div class="invalid-feedback">
                        Ingrese Observaciones
                </div>
        </fieldset>

    </div>


    <button type="submit" class="btn btn-primary button" >Guardar</button>

    <a href="{{ route('samu.mobileinservice.index') }}" class="btn btn-outline-secondary">Cancelar</a>
</form>


@endsection

@section('custom_js')

@endsection