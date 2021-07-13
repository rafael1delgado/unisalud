@extends('layouts.app')

@section('title', 'Licencia Medica')

@section('content')

<!--inicio-->

<!--{{ $user->birthday }} mostrar la fecha de nacimiento del usuario encontrado --> 
<div class="card w-20">
  <div class="card-body">
    <h5 class="card-title" class="form-control" name="id" value="{{ $user->id }}"></h5>
  </div>
</div>

<!--<input type="text" class="form-control" name="id" value="{{ $user->id }}">-->

<div class="form-row">
    <div class="form-group col-md-5">
       <label for="for-rut">RUT</label>
       <input type="number" class="form-control" name="rut" id="rut">
    </div>
    <div class="form-group col-md-3">
        <label for="">&nbsp;</label>
        <button type="submit" class="btn btn-primary form-control">Buscar</button>
    </div>
</div>

<form method="post" action="{{route('medical_licence.store', $user)}}">
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
        <select id="tipo_licencia" class="form-control" name="tipo_licencia">
            <option selected>Seleccione tipo</option>
            <option value ="1">Enfermedad o accidente común</option>
            <option value ="2">Prorroga medicina preventiva</option>
            <option value ="3">Licencia meternal pre y post natal</option>
            <option value ="4">Enfermedad grave niño menorde 1 año</option>
            <option value ="5">Accidente del trabajo o del trayecto</option>
            <option value ="6">Enfermedad profesional</option>
            <option value ="7">Patología del embarazo</option>
        </select>
    </div>

</div>


<div class="form-row">
    <h5 class="card-title col-md-12">CARACTERISTICAS DEL REPOSO</h5>
    <div class="form-group col-md-3">
       <label for="tipo_reposo">TIPO DE REPOSO</label>
        <select id="tipo_reposo" class="form-control" name="tipo_reposo">
            <option selected>Seleccione tipo</option>
            <option value ="1">Reposo laboral Total</option>
            <option value ="2">Reposo laboral Parcial</option>
        </select>
    </div>
        <!--div oculta-->
        <div class="form-group col-md-3" id="reposo_parcial">
        <label>REPOSO PARCIAL</label>
        <select id="reposo_parcial" class="form-control" name="reposo_parcial">
            <option selected>Seleccione tipo</option>
            <option value ="1">Mañana</option>
            <option value ="2">Tarde </option>
            <option value ="3">Noche</option>
        </select>
    </div>
     <!-- fin div oculta-->

    <div class="form-group col-md-3">
       <label>LUGAR DE REPOSO</label>
        <select id="lugar_reposo" class="form-control" name="lugar_reposo" >
            <option selected>Seleccione tipo</option>
            <option value ="1">Domicilio</option>
            <option value ="2">Hospital</option>
            <option value ="3">Otro</option>
        </select>
    </div>
 
    <div class="form-group col-md-3">
        <label for="">&nbsp;</label>
        <button type="submit" class="btn btn-primary form-control">Guardar</button>
    </div>

</form>

     
<!--tabla-->
 
<table>
    <table class="table table-sm">
        <thead>
            <t>
                <th>Usuario</th>
                <th>Fecha inicio reposo</th>
                <th>N° de días</th>
                <th>Tipo de licencia</th>
                <th>Tipo de reposo</th>
                <th>Reposo parcial</th>
                <th>Lugar de reposo</th>
            </t>
        </thead>
        <tbody>
            @foreach($medicalLicences as $ml)
            <tr>
                <td>{{ $ml->usuario}}</td>
                <td>{{ $ml->fecha_inicio_reposo}}</td>
                <td>{{ $ml->n_dias}}</td>
                <td>{{ $ml->tipo_licencia}}</td>
                <td>{{ $ml->tipo_reposo}}</td>
                <td>{{ $ml->reposo_parcial}}</td>
                <td>{{ $ml->lugar_reposo}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</table>
<!--fin-->



@endsection

@section('custom_js')

<!---jquery ocultar elemento-->

<script type="text/javascript">
    $("#reposo_parcial").hide();

    jQuery('select[name=tipo_reposo]').change(function(){
        //var fieldsetName = $(this).val();
        switch(this.value){
            case "1":
                $("#reposo_parcial").hide();
                break;
            case "2":
                $("#reposo_parcial").show();
                break;

        }
    });
</script>
<!--- fin jquery ocultar elemento-->
@endsection







