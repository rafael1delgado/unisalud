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
        <label for="for_receptor_id">Recep. de llamada</label>
        <select class="form-control form-control-sm" name="receptor_id" id="receptor_id">
            <option value=""></option>
            @foreach($shiftUsers as $su)
                @if($su->jobType->name=='Operador')
                <option value="Operador 1" >{{ $su->user->humanNames->last()->fullName }} - {{ $su->jobType->name }}</option>
                @endif
            @endforeach
        </select>
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_information">Motivo de solicitud </label>
        <input type="text" class="form-control form-control-sm" 
            name="information" 
            value="{{ old('information', optional($call)->information) }}">
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