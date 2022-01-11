<div class="form-row">

    @if(request()->routeIs('samu.call.edit'))
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
    @endif

    <fieldset class="form-group col-md-1">
        <label for="for_hour">Hora*</label>
        <input type="time" class="form-control form-control-sm" name="hour" id="hour" value="{{ old('hour', ($call)? $call->hour : date('H:i')) }}" required> 
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_applicant">Solicitante </label>
        <input type="text" class="form-control form-control-sm" name="applicant"
            value="{{ old('applicant', optional($call)->applicant) }}">
    </fieldset>

    <fieldset class="form-group col-md-4">
        <label for="for_address">Dirección </label>
        <input type="text" class="form-control form-control-sm" name="address"
            value="{{ old('address', optional($call)->address) }}">
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_telephone">Teléfono </label>
        <input type="text" class="form-control form-control-sm" name="telephone"
            value="{{ old('telephone', optional($call)->telephone) }}">
    </fieldset>


</div>

<div class="form-row">
    
    <fieldset class="form-group col-md-12">
        <label for="for_information">Información telefónica*</label>
        <textarea class="form-control form-control-sm" name="information" rows="5" required>{{ old('information', optional($call)->information) }}</textarea>
    </fieldset>

</div>