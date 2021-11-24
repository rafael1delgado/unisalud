<div class="form-row">

    <fieldset class="form-group col-md-1">
        <label for="for_hour">Clasificación</label>
        <select class="form-control form-control-sm" name="classification" id="classification" {{ optional($call)->classification == 'OT' ? 'disabled readonly' : '' }}>
            <option></option>
            <option value="T1" {{ optional($call)->classification == 'T1' ? 'selected' : '' }}>T1</option>
            <option value="T2" {{ optional($call)->classification == 'T2' ? 'selected' : '' }}>T2</option>
            <option value="NM" {{ optional($call)->classification == 'NM' ? 'selected' : '' }}>NM</option>
            <option value="OT" {{ optional($call)->classification == 'OT' ? 'selected' : '' }}>OT</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_hour">Hora</label>
        <input type="time" class="form-control form-control-sm" name="hour" id="hour" value="{{ old('hour', optional($call)->hour) }}"> 
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_call_reception">Recep. de llamada</label>
        <select class="form-control form-control-sm" name="call_reception" id="call_reception">
            <option>{{ optional($call)->call_reception }}</option>
            <option value="Operador 1" >Operador 1</option>
            <option value="Operador 2" >Operador 2</option>
            <option value="Operador 3" >Operador 3</option>
            <option value="Operador 4" >Operador 4</option>
            <option value="Operador 5" >Operador 5</option>
            <option value="Operador 6" >Operador 6</option>
            <option value="Jefe de turno" >Jefe de turno</option>
            <option value="Medico Regulador" >Medico Regulador</option>
            <option value="Enfermera Reguladora" >Enfermera Reguladora</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_telephone_information">Motivo de solicitud </label>
        <input type="text" class="form-control form-control-sm" 
            name="telephone_information" 
            value="{{ old('telephone_information', optional($call)->telephone_information) }}">
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_applicant">Solicitante </label>
        <input type="text" class="form-control form-control-sm" name="applicant"
            value="{{ old('applicant', optional($call)->applicant) }}">
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_address">Dirección </label>
        <input type="text" class="form-control form-control-sm" name="address"
            value="{{ old('address', optional($call)->address) }}">
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_telephone">Teléfono </label>
        <input type="text" class="form-control form-control-sm" name="telephone"
            value="{{ old('telephone', optional($call)->telephone) }}">
    </fieldset>

    <div class="col-1">
        <label for="">&nbsp; </label>
        <button type="submit" class="btn btn-primary btn-sm form-control  form-control-sm"> <i class="fas fa-save"></i> </button>
    </div>
        
</div>