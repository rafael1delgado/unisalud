
@extends('layouts.app')

@section('content')
@include('nav')

<style>
 .button1{
     margin-top:30px;
     }
</style>
<form action="{{route('samu.shift.update', $shift)}}" method="POST" autocomplete="off">
    @csrf
    @method('PUT')
    <div class="card mb-3">
        <div class="card-body">
            <div class="col-md-6">
                <h3 class="mb-3"><i class="fas fa-blender-phone"></i> Editar Turno</h3>
            </div>
            <hr>
            <div class="form-row">
                <fieldset class="form-group  col-md-4">
                    <label for="for_date"><b>Fecha de registro</b> </label>
                    <input type="date" class="form-control" name="date" id="for_date" value="{{ date_format($shift->created_at,"Y-m-d") }}">
                </fieldset>
                <fieldset class="form-group  col-md-4">
                    <label for="for_type"><b>Tipo de Turno</b> </label>
                    <select class="form-control" name="type" id="for_type">
                        <option value="Noche" {{($shift->type=='Noche')?'selected':''}}>Noche</option>
                        <option value="Largo" {{($shift->type=='Largo')?'selected':''}}>Largo</option>
                    </select>
                </fieldset>
                <fieldset class="form-group  col-md-4">
                    <label for="for_opening_time"><i class="fas fa-clock"></i><b> Hora Apertura de turno</b> </label>
                    <input type="time" class="form-control" name="opening_time" id="for_opening_time" value="{{$shift->opening_time}}">
                </fieldset>
            </div>
            <hr>

            <fieldset class="form-group col-12 col-md-2  ">
                
                <button type="submit" class="btn btn-primary button " >Guardar</button>

            </fieldset>
        </div>
    </div>
</form>
    





@endsection