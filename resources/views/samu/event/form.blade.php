<h4> Asignación de seguimiento y horarios</h4>
<div class="form-row">

    <fieldset class="form-group col-md-3">
        <label for="for-key">Clave*</label>
        <select class="form-control" name="key_id" id="for-key" required>
            <option value="">Selecciona una Clave</option>
            @foreach($keys as $key)
            <option 
                value="{{ $key->id }}" 
                {{ old('key_id', $call ? optional($call)->key_id : optional($event)->key_id) == $key->id ? 'selected' : '' }}>
                {{ $key->key }}  - {{ $key->name }}
            </option>
            @endforeach 
        </select>
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for-return-key">Clave de Retorno</label>
        <select class="form-control" name="return_key_id" id="for-return-key">
            <option value="">Selecciona una Clave de Retorno</option>
            @foreach($keys as $key)
            <option value="{{ $key->id }}" {{ old('return_key_id', optional($event)->return_key_id) == $key->id ? 'selected' : '' }}>
                {{ $key->key }}  - {{ $key->name }}
            </option>
            @endforeach 
        </select>
    </fieldset>
                                
   
    <fieldset class="form-group col-md-6">
        <label for="for-observation">Observación</label>
        <input type="text" class="form-control" name="observation" id="for-observation" value="{{ old('observation', optional($event)->observation) }}">
    </fieldset>
</div>

<div class="form-row">

    <fieldset class="form-group col-md-3">
        <label for="for-mobile">Móvil*</label>
        <select class="form-control" name="mobile_id" id="for-mobile" required>
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
        <label for="for-external-crew">Tripulación externa (si el móvil no pertenece a SAMU)</label>
        <input type="text" class="form-control" name="external_crew" id="for-external-crew" value="{{ old('external_crew', optional($event)->external_crew) }}">
    </fieldset>

</div>
            
<div class="form-row">

    <fieldset class="form-group col-md-1">
        <label for="for-departure-at">Aviso salida</label>
        <input type="time" class="form-control" name="departure_at" id="for-departure-at" value="{{ ( $event &&  $event->departure_at)? $event->departure_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for-mobile-departur-at">Salida móvil</label>
        <input type="time" class="form-control" name="mobile_departure_at" id="for-mobile-departur-at" value="{{ ( $event &&  $event->mobile_departure_at)? $event->mobile_departure_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for-mobile-arrival-at">Llegada al lugar</label>
        <input type="time" class="form-control" name="mobile_arrival_at" id="for-mobile-arrival-at" value="{{ ( $event &&  $event->mobile_arrival_at)? $event->mobile_arrival_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for-route-to-healtcenter-at">Ruta c.asistencial </label>
        <input type="time" class="form-control" name="route_to_healtcenter_at" id="for-route-to-healtcenter-at" value="{{ ( $event &&  $event->route_to_healtcenter_at)? $event->route_to_healtcenter_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for-healthcenter-at">Centro asistencial</label>
        <input type="time" class="form-control" name="healthcenter_at" id="for-healthcenter-at" value="{{ ( $event &&  $event->healthcenter_at)? $event->healthcenter_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for-patient-reception-at">Recepción de pcte</label>
        <input type="time" class="form-control" name="patient_reception_at" id="for-patient-reception-at" value="{{ ( $event &&  $event->patient_reception_at)? $event->patient_reception_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for-return-base-at">Retorno base</label>
        <input type="time" class="form-control" name="return_base_at" id="for-return-base-at" value="{{ ( $event &&  $event->return_base_at)? $event->return_base_at->format('H:i') : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for-on-base-at">Móvil en base</label>
        <input type="time" class="form-control" name="on_base_at" id="for-on-base-at" value="{{ ( $event &&  $event->on_base_at)? $event->on_base_at->format('H:i') : '' }}">
    </fieldset>
        
</div>

            
<div class="form-row">

    <fieldset class="form-group col-md-5">
        <label for="for-address">Dirección</label>
        <input type="text" class="form-control" name="address" id="for-address"
        value="{{ old('address', $call ? optional($call)->address : optional($event)->address )}}">
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for-commune">Comuna</label>
        <select class="form-control" name="commune_id" id="for-commune">
            <option value="">Selecciona una Comuna</option>
            @foreach($communes as $name => $id)
            <option value="{{ $id }}" {{ old('commune_id', $call ? optional($call)->commune_id : optional($event)->commune_id ) == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach 
        </select>
    </fieldset>

</div>


<hr>


<h4>Datos del paciente</h4>
<div class="form-row">

    <fieldset class="form-check form-check-inline col-md-1 col-12">
        <input class="form-check-input" type="checkbox" name="patient_unknown" 
            id="patient-unknown" value="1" {{ ( $event &&  $event->patient_unknown)? 'checked' : '' }}>
        <label class="form-check-label" for="patient-unknown">No identificado</label>
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for-patient-name">Nombre del paciente</label>
        <input type="text" class="form-control" name="patient_name" id="for-patient-name" 
            value="{{ old('patient_name', optional($event)->patient_name) }}">
    </fieldset>

    <fieldset class="form-group col-12 col-md-2">
        <label for="for-identifier-type">Tipo de identificación</label>
        <select class="form-control" name="patient_identifier_type_id" id="for-identifier-type">
            <option value="">Seleccione Tipo identificación</option>
            @foreach($identifierTypes as $text => $id)
                <option value="{{ $id }}" {{ old('patient_identifier_type_id', optional($event)->patient_identifier_type_id) == $id ? 'selected' : '' }}>{{ $text }}</option>
            @endforeach
        </select>
    </fieldset>
    
    <fieldset class="form-group col-md-2">
        <label for="for-patient-identification">Identificación</label>
        <input type="text" class="form-control" name="patient_identification" id="for-patient-identification"
            value="{{ old('patient_identification', optional($event)->patient_identification) }}"
            placeholder="sin puntos ni guión">
    </fieldset>
    
</div>


<hr>

<h4>Evaluación </h4>

<div class="form-row">
    <fieldset class="form-group col-md-12">
        <label for="for-reception-detail">Detalle de recepción</label>                                
        <textarea class="form-control" rows="6" name="reception_detail" id="for-reception-detail">{{ old('reception_detail', optional($event)->reception_detail) }}</textarea>
    </fieldset>
</div>


<div class="form-row">
    <fieldset class="form-group col-md-3 col-12">
        <label for="for-establishment">Establecimiento recepción pcte.</label>
        <select class="form-control" name="establishment_id" id="for-establishment">
            <option value="">Seleccione recepción pcte</option>
            @foreach($establishments as $name => $id)
                <option value="{{ $id }}" {{ old('establishment_id', optional($event)->establishment_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach
        </select>
    </fieldset>

    <fieldset class="form-group col-md-2 col-12">
        <label for="for-establishment-details">Ubicación dentro del establecimiento.</label>
        <input type="text" class="form-control" name="establishment_details" id="for-establishment-details" value="{{ old('establishment_details', optional($event)->establishment_details) }}">
    </fieldset>
    
    <fieldset class="form-group col-md-3 col-12">
        <label for="for-reception-person">Personal recepción pcte.</label>
        <input type="text" class="form-control" name="reception_person" id="for-reception-person" value="{{ old('reception_person', optional($event)->reception_person) }}">
    </fieldset>

    <fieldset class="form-group col-12 col-md-2">
        <label for="for-rau">Registro Atención Urgencia</label>
        <input type="number" class="form-control" name="rau" id="for-rau" value="{{ old('rau', optional($event)->rau) }}">
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for-reception-place-id">Otro lugar de recepción</label>
        <select class="form-control" name="reception_place_id" id="for-reception-place-id">
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
        <label for="for-fc">Frecuencia <br>Cardiaca</label>
        <input type="text" class="form-control" maxlength="8" name="fc" id="for-fc" value="{{ old('fc', optional($event)->fc) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-fr">Frecuencia <br>Respiratoria</label>
        <input type="number" class="form-control" name="fr" id="for-fr" value="{{ old('fr', optional($event)->fr) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-pa">Presión <br>Arterial</label>
        <input type="text" class="form-control" name="pa" id="for-pa" value="{{ old('pa', optional($event)->pa) }}" 
            placeholder="xxx/xx">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-pam">Presión Arterial <br>Media</label>
        <input type="text" class="form-control" name="pam" id="for-pam" value="{{ old('pam', optional($event)->pam) }}"
            placeholder="xxx/xx">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-gl">Glasgow<br>&nbsp;</label>
        <input type="number" class="form-control" name="gl" id="for-gl" value="{{ old('gl', optional($event)->gl) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-soam">% Saturacion <br>Oxigeno/Ambi.</label>
        <input type="number" class="form-control" name="soam" id="for-soam" value="{{ old('soam', optional($event)->soam) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-soap">% Saturación <br>Oxigeno/Apoyo</label>
        <input type="number" class="form-control" name="soap" id="for-soap" value="{{ old('soap', optional($event)->soap) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-hgt">HGT <br>mg/dl</label>
        <input type="number" class="form-control" name="hgt" id="for-hgt" value="{{ old('hgt', optional($event)->hgt) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-fill-capillary">Llene <br>Capilar</label>
        <input type="number" class="form-control" name="fill_capillary" id="for-fill-capillary" value="{{ old('fill_capillary', optional($event)->fill_capillary) }}">
    </fieldset>
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-t">Temperatura <br>°C</label>
        <input type="number" class="form-control" step=".01" name="t" id="for-t" value="{{ old('t', optional($event)->t) }}">
    </fieldset>

</div>

<div class="form-row">
    <fieldset class="form-group col-12 col-md-4">
        <label for="for-treatment">Tratamiento</label>
        <textarea class="form-control" rows="6" name="treatment" id="for-treatment">{{ old('treatment', optional($event)->treatment) }}</textarea>
    </fieldset>
    <fieldset class="form-group col-12 col-md-8">
        <label for="for-observation-sv">Observación</label>
        <textarea class="form-control" rows="6" name="observation_sv" id="for-observation-sv">{{ old('observation_sv', optional($event)->observation_sv) }}</textarea>
    </fieldset>             
</div>
<!-- fin de seguimeinto-->