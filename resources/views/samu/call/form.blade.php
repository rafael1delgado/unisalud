<div class="form-row">

    <fieldset class="form-group col-md-1">
        <label for="for_hour">Clase</label>
        <select class="form-control form-control-sm" name="class_call" id="class_call">
            <option>Seleccionar</option>
            <option value="T1" {{ optional($call)->class_call == 'T1' ? 'selected' : '' }}>T1</option>
            <option value="T2" {{ optional($call)->class_call == 'T2' ? 'selected' : '' }}>T2</option>
            <option value="NM" {{ optional($call)->class_call == 'NM' ? 'selected' : '' }}>NM</option>
            <option value="OT" {{ optional($call)->class_call == 'OT' ? 'selected' : '' }}>OT</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_hour">Hora</label>
        <input type="time" class="form-control form-control-sm" name="hour" id="hour" value="{{ optional($call)->hour }}"> 
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_call_reception">Recep. de llamada</label>
        <select class="form-control form-control-sm" name="call_reception" id="call_reception">
            <option>{{ optional($call)->call_reception }}</option>
            @foreach($shift_users as $su)
            <option value="Operador 1" >{{ $su->user->humanNames->last()->fullName }} - {{ $su->jobType->name }}</option>
        </select>
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_telephone_information">Motivo de solicitud </label>
        <input type="text" class="form-control form-control-sm" 
            name="telephone_information" 
            value="{{ optional($call)->telephone_information }}">
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_applicant">Solicitante </label>
        <input type="text" class="form-control form-control-sm" name="applicant"
            value="{{ optional($call)->applicant }}">
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_address">Dirección </label>
        <input type="text" class="form-control form-control-sm" name="address"
            value="{{ optional($call)->address }}">
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_telephone">Teléfono </label>
        <input type="text" class="form-control form-control-sm" name="telephone"
            value="{{ optional($call)->telephone }}">
    </fieldset>

    <div class="col-1">
        <label for="">&nbsp; </label>
        <button type="submit" class="btn btn-primary btn-sm form-control  form-control-sm"> <i class="fas fa-save"></i> </button>
    </div>
        
</div>