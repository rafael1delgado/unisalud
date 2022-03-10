<h4> Asignación de seguimiento y horarios</h4>
<div class="form-row">

    <fieldset class="form-group col-md-3">
        <label for="for_key">Clave*</label>
        <select class="form-control" name="key_id" required>
            <option value="">Selecciona una Clave</option>
            @foreach($keys as $key)
            <option value="{{ $key->id }}" {{ old('key_id', optional($event)->key_id) == $key->id ? 'selected' : '' }}>{{ $key->key }}  - {{ $key->name }}</option>
            @endforeach 
        </select>
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_return">Clave de Retorno</label>
        <select class="form-control" name="return_key_id">
            <option value="">Selecciona una Clave de Retorno</option>
            @foreach($keys as $key)
            <option value="{{ $key->id }}" {{ old('return_key_id', optional($event)->return_key_id) == $key->id ? 'selected' : '' }}>{{ $key->key }}  - {{ $key->name }}</option>
            @endforeach 
        </select>
    </fieldset>
                                
   
    <fieldset class="form-group col-md-6">
        <label for="for_observation">Observación</label>
        <input type="text" class="form-control" name="observation" value="{{ old('observation', optional($event)->observation) }}">
    </fieldset>
</div>

<div class="form-row">

    <fieldset class="form-group col-md-3">
        <label for="for_mobile">Móvil*</label>
        <select class="form-control" name="mobile_id">
            <option value="">Selecciona un Móvil</option>
            @foreach($mobilesInService as $mis)
            <option value="{{ $mis->mobile->id }}" {{ old('mobile_id', optional($event)->mobile_id) == $mis->mobile->id ? 'selected' : '' }}>
                {{ $mis->mobile->code }} {{ $mis->mobile->name }} - {{ $mis->type }} (PROPIO) 
                {{ ($mis->isHavingLunch()) ? ' - (COLACIÓN)' : '' }}
            </option>
            @endforeach 
            @foreach($mobiles as $mobile)
            <option value="{{ $mobile->id }}" {{ old('mobile_id', optional($event)->mobile_id) == $mobile->id ? 'selected' : '' }}>
                {{ $mobile->code }} {{ $mobile->name }}
            </option>
            @endforeach
        </select>
    </fieldset>

    <fieldset class="form-group col-md-9">
        <label for="for_external_crew">Tripulación externa (si el móvil no pertenece a SAMU)</label>
        <input type="text" class="form-control" name="external_crew" value="{{ old('external_crew', optional($event)->external_crew) }}">
    </fieldset>

</div>
            
<div class="form-row">

    <fieldset class="form-group col-md-1">
        <label for="for_departure_at">Aviso salida</label>
        <input type="time" class="form-control" name="departure_at" value="{{ ( $event &&  $event->departure_at)? $event->departure_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_mobile_departure_at">Salida móvil</label>
        <input type="time" class="form-control" name="mobile_departure_at" value="{{ ( $event &&  $event->mobile_departure_at)? $event->mobile_departure_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_mobile_arrival_at">Llegada al lugar</label>
        <input type="time" class="form-control" name="mobile_arrival_at" value="{{ ( $event &&  $event->mobile_arrival_at)? $event->mobile_arrival_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_route_to_healtcenter_at">Ruta c.asistencial </label>
        <input type="time" class="form-control" name="route_to_healtcenter_at" value="{{ ( $event &&  $event->route_to_healtcenter_at)? $event->route_to_healtcenter_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_healthcenter_at">Centro asistencial</label>
        <input type="time" class="form-control" name="healthcenter_at" value="{{ ( $event &&  $event->healthcenter_at)? $event->healthcenter_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_patient_reception_at">Recepción de pcte</label>
        <input type="time" class="form-control" name="patient_reception_at" value="{{ ( $event &&  $event->patient_reception_at)? $event->patient_reception_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_return_base_at">Retorno base</label>
        <input type="time" class="form-control" name="return_base_at" value="{{ ( $event &&  $event->return_base_at)? $event->return_base_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_on_base_at">Móvil en base</label>
        <input type="time" class="form-control" name="on_base_at" value="{{ ( $event &&  $event->on_base_at)? $event->on_base_at->format('H:i') : '' }}">
    </fieldset>
        
</div>

            
<div class="form-row">

    <fieldset class="form-group col-md-5">
        <label for="for_address">Dirección</label>
        <input type="text" class="form-control" name="address" value="{{ old('address', optional($event)->address) }}">
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_commune">Comuna</label>
        <select class="form-control" name="commune_id">
            <option value="">Selecciona una Comuna</option>
            @foreach($communes as $name => $id)
            <option value="{{ $id }}" {{ old('commune_id', optional($event)->commune_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach 
        </select>
    </fieldset>

</div>


<hr>



<h4>Datos del paciente</h4>
<div class="form-row">

    <fieldset class="form-check form-check-inline col-md-1 col-12">
        <input class="form-check-input" type="checkbox" name="patient_unknown" 
            id="patient_unknown" value="1" {{ ( $event &&  $event->patient_unknown)? 'checked' : '' }}>
        <label class="form-check-label" for="patient_unknown">No identificado</label>
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_patient_name">Nombre del paciente</label>
        <input type="text" class="form-control" name="patient_name" 
            value="{{ old('patient_name', optional($event)->patient_name) }}">
    </fieldset>

    <fieldset class="form-group col-12 col-md-2">
        <label for="for_identifierType">Tipo de identificación</label>
        <select class="form-control" name="patient_identifier_type_id" id="patient_identifier_type_id">
            <option value="">Seleccione Tipo identificación</option>
            @foreach($identifierTypes as $text => $id)
                <option value="{{ $id }}" {{ old('patient_identifier_type_id', optional($event)->patient_identifier_type_id) == $id ? 'selected' : '' }}>{{ $text }}</option>
            @endforeach
        </select>
    </fieldset>
    
    <fieldset class="form-group col-md-2">
        <label for="for_patient_identification">Identificación</label>
        <input type="text" class="form-control" name="patient_identification" 
            value="{{ old('patient_identification', optional($event)->patient_identification) }}"
            placeholder="sin puntos ni guión">
    </fieldset>
    
</div>


<hr>

<h4>Evaluación </h4>

<div class="form-row">
    <fieldset class="form-group col-md-12">
        <label for="for_reception_detail">Detalle de recepción</label>                                
        <textarea class="form-control" rows="6" name="reception_detail">{{ old('reception_detail', optional($event)->reception_detail) }}</textarea>
    </fieldset>
</div>


<div class="form-row">
    <fieldset class="form-group col-md-3 col-12">
        <label for="for_establishment">Establecimiento recepción pcte.</label>
        <select class="form-control" name="establishment_id" id="establishment_id">
            <option value="">Seleccione recepción pcte</option>
            @foreach($establishments as $name => $id)
                <option value="{{ $id }}" {{ old('establishment_id', optional($event)->establishment_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </fieldset>

    <fieldset class="form-group col-md-2 col-12">
        <label for="for_establishment_details">Ubicación dentro del establecimiento.</label>
        <input type="text" class="form-control" name="establishment_details" value="{{ old('establishment_details', optional($event)->establishment_details) }}">
    </fieldset>
    
    <fieldset class="form-group col-md-3 col-12">
        <label for="for_reception_person">Personal recepción pcte.</label>
        <input type="text" class="form-control" name="reception_person" value="{{ old('reception_person', optional($event)->reception_person) }}">
    </fieldset>

    <fieldset class="form-group col-12 col-md-2">
        <label for="for_rau">Registro Atención Urgencia</label>
        <input type="number" class="form-control" name="rau" value="{{ old('rau', optional($event)->rau) }}">
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_reception_place_id">Otro lugar de recepción</label>
        <select class="form-control" name="reception_place_id" id="reception_place_id">
            <option value="">Seleccione Lugar Recepción</option>
            @foreach($receptionPlaces as $name => $id)
                <option value="{{ $id }}" {{ old('reception_place_id', optional($event)->reception_place_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </fieldset>


</div>


<hr>

<h4> Asignación Signos Vitales</h4>

<div class="form-row">
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_fc">Frecuencia <br>Cardiaca</label>
        <input type="text" class="form-control" maxlength="8" name="fc" value="{{ old('fc', optional($event)->fc) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_fr">Frecuencia <br>Respiratoria</label>
        <input type="number" class="form-control" name="fr" value="{{ old('fr', optional($event)->fr) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_pa">Presión <br>Arterial</label>
        <input type="text" class="form-control" name="pa" value="{{ old('pa', optional($event)->pa) }}" 
            placeholder="xxx/xx">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_pam">Presión Arterial <br>Media</label>
        <input type="text" class="form-control" name="pam" value="{{ old('pam', optional($event)->pam) }}"
            placeholder="xxx/xx">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_gl">Glasgow<br>&nbsp;</label>
        <input type="number" class="form-control" name="gl" value="{{ old('gl', optional($event)->gl) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_soam">% Saturacion <br>Oxigeno/Ambi.</label>
        <input type="number" class="form-control" name="soam" value="{{ old('soam', optional($event)->soam) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_soap">% Saturación <br>Oxigeno/Apoyo</label>
        <input type="number" class="form-control" name="soap" value="{{ old('soap', optional($event)->soap) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_hgt">HGT <br>mg/dl</label>
        <input type="number" class="form-control" name="hgt" value="{{ old('hgt', optional($event)->hgt) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_fill_capillary">Llene <br>Capilar</label>
        <input type="number" class="form-control" name="fill_capillary" value="{{ old('fill_capillary', optional($event)->fill_capillary) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for_t">Temperatura <br>°C</label>
        <input type="number" class="form-control" step=".01" name="t" value="{{ old('t', optional($event)->t) }}">
    </fieldset>

</div>

<div class="form-row">
    <fieldset class="form-group col-12 col-md-4">
        <label for="for_treatment">Tratamiento</label>
        <textarea class="form-control" rows="6" name="treatment">{{ old('treatment', optional($event)->treatment) }}</textarea>
    </fieldset>
    <fieldset class="form-group col-12 col-md-8">
        <label for="for_observation_sv">Observación</label>
        <textarea class="form-control" rows="6" name="observation_sv">{{ old('observation_sv', optional($event)->observation_sv) }}</textarea>
    </fieldset>             
</div>
<!-- fin de seguimeinto-->