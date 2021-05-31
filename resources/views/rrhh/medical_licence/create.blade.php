@extends('layouts.app')

@section('title', 'Licencia Medica')

@section('content')

<!--inicio-->
<form method="post" action="{{route('medical_licence.store')}}">
@csrf

<div class="form-row">
    <div class="form-group col-md-5">
       <label for="for-fecha_inicio_reposo">FECHA INICIO REPOSO</label>
       <input type="date" class="form-control" name="fecha_inicio_reposo" id="fecha_inicio_reposo">
    </div>

    <div class="form-group col-md-2">
       <label for="for-n_dias">N° DE DÍAS</label>
       <input type="number" class="form-control" name="n_dias" id="n_dias">
    </div>

    <div class="form-group col-md-5">
       <label for="tipo_licencia" >TIPO LICENCIA</label>
        <select id="inputState" class="form-control" name="tipo_licencia">
            <option selected>Seleccione tipo</option>
            <option value ="Enfermedad o accidente común">Enfermedad o accidente común</option>
            <option value ="Prorroga medicina preventiva">Prorroga medicina preventiva</option>
            <option value ="Licencia meternal pre y post natal">Licencia meternal pre y post natal</option>
            <option value ="Enfermedad grave niño menorde 1 año<">Enfermedad grave niño menorde 1 año</option>
            <option value ="Accidente del trabajo o del trayecto">Accidente del trabajo o del trayecto</option>
            <option value ="Enfermedad profesional">Enfermedad profesional</option>
            <option value ="Patología del embarazo">Patología del embarazo</option>
        </select>
    </div>

</div>


<div class="form-row">
    <h5 class="card-title col-md-12">CARACTERISTICAS DEL REPOSO</h5>
    <div class="form-group col-md-5">
       <label for="tipo_reposo">TIPO DE REPOSO</label>
        <select id="inputState" class="form-control" name="tipo_reposo">
            <option selected>Seleccione tipo</option>
            <option value ="Reposo laboral Total">Reposo laboral Total</option>
            <option value ="Prorroga laboral Parcial">Prorroga laboral Parcial</option>
        </select>
    </div>

    <div class="form-group col-md-5">
       <label for="lugar_reposo">LUGAR DE REPOSO</label>
        <select id="inputState" class="form-control" name="lugar_reposo">
            <option selected>Seleccione tipo</option>
            <option value ="Domicilio">Domicilio</option>
            <option value ="Hospital">Hospital</option>
            <option value ="Otro">Otro</option>
        </select>
    </div>

    <div class="form-group col-md-2">
        <label for="">&nbsp;</label>
        <button type="submit" class="btn btn-primary form-control">Guardar</button>
    </div>

</form>

     
<!--tabla-->
 
<table>
    <table class="table table-sm">
        <thead>
            <t>
                <th>Fecha inicio reposo</th>
                <th>N° de días</th>
                <th>Tipo de licencia</th>
                <th>Tipo de reposo</th>
                <th>Lugar de reposo</th>
            </t>
        </thead>
        <tbody>
            @foreach($medicalLicences as $ml)
            <tr>
                <td>{{ $ml->fecha_inicio_reposo}}</td>
                <td>{{ $ml->n_dias}}</td>
                <td>{{ $ml->tipo_licencia}}</td>
                <td>{{ $ml->tipo_reposo}}</td>
                <td>{{ $ml->lugar_reposo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</table>
<!--fin-->

@endsection

@section('custom_js')

@endsection