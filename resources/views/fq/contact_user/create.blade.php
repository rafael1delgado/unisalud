@extends('layouts.app')

@section('title', 'Nuevo Staff')

@section('content')

@include('fq.partials.nav')

<br>

<h5>Ingreso de Contacto</h5>

<br>

<form method="POST" class="form-horizontal" action="{{ route('fq.contact_user.store') }}">
    @csrf
    @method('POST')

    <div class="form-row">
        <fieldset class="form-group col-sm-2">
            <label for="for_run">RUT</label>
            <input type="number" class="form-control" name="run" id="for_run" value=""
              required>
        </fieldset>
        <fieldset class="form-group col-sm-1">
            <label for="for_dv">DV</label>
            <input type="text" class="form-control" name="dv" id="for_dv" value=""
              required>
        </fieldset>
        <fieldset class="form-group col-5">
            <label for="for_name">Nombres</label>
            <input type="text" class="form-control" name="name" id="for_name" value=""
              required>
        </fieldset>
        <fieldset class="form-group col-2">
            <label for="for_name">Apellido Paterno</label>
            <input type="text" class="form-control" name="fathers_family" id="for_fathers_family" value=""
              required>
        </fieldset>
        <fieldset class="form-group col-2">
            <label for="for_name">Apellido Materno</label>
            <input type="text" class="form-control" name="mothers_family" id="for_mothers_family" value="">
        </fieldset>
    </div>

    <div class="form-row">
      <fieldset class="form-group col-sm-3">
          <label for="for_email">Correo Electrónico</label>
          <input type="text" class="form-control" name="email" id="for_email" placeholder="correo@mail.com"
            required>
      </fieldset>
      <fieldset class="form-group col-sm-2">
          <label for="for_telephone">Teléfono</label>
          <input type="number" class="form-control" name="telephone" id="for_telephone" placeholder="9xxxxxxxx"
            required>
      </fieldset>
      <fieldset class="form-group col-sm-2">
          <label for="for_telephone2">Teléfono</label>
          <input type="number" class="form-control" name="telephone2" id="for_telephone2" placeholder="9xxxxxxxx">
      </fieldset>
      <fieldset class="form-group col-sm-3">
          <label for="for_address">Dirección</label>
          <input type="text" class="form-control" name="address" id="for_address"
            required>
      </fieldset>
      <fieldset class="form-group col-2">
          <label for="for_commune">Comuna</label>
          <select name="commune" id="for_commune" class="form-control" required>
              <option value="">Seleccione...</option>
              <option value="alto hospicio">Alto Hospicio</option>
              <option value="camina">Camiña</option>
              <option value="colchane">Colchane</option>
              <option value="huara">Huara</option>
              <option value="iquique">Iquique</option>
              <option value="pica">Pica</option>
              <option value="pozo almonte">Pozo Almonte</option>
          </select>
      </fieldset>
    </div>

    <button type="submit" class="btn btn-primary float-right"><i class="fas fa-save"></i> Guardar</button>

</form>

@endsection

@section('custom_js')

@endsection
