<div class="form-row">

    <fieldset class="form-group col-md-3">
        <label for="for_key">Clave*</label>
        <select class="form-control" name="key_id" required>
            <option value=""></option>
            @foreach($keys as $key)
            <option value="{{ $key->id }}" {{ old('key_id', optional($event)->key_id) == $key->id ? 'selected' : '' }}>{{ $key->key }}  - {{ $key->name }}</option>
            @endforeach 
        </select>
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_return">Clave de retorno</label>
        <select class="form-control" name="return_key_id">
            <option value=""></option>
            @foreach($keys as $key)
            <option value="{{ $key->id }}" {{ old('return_key_id', optional($event)->return_key_id) == $key->id ? 'selected' : '' }}>{{ $key->key }}  - {{ $key->name }}</option>
            @endforeach 
        </select>
    </fieldset>
                                
   
    <fieldset class="form-group col-md-6">
        <label for="for_observation">Observación</label>
        <input type="text" class="form-control" name="observation" value="{{ ( $event &&  $event->observation)? $event->observation : '' }}">
    </fieldset>
</div>

<div class="form-row">

    <fieldset class="form-group col-md-3">
        <label for="for_mobile">Móvil</label>
        <select class="form-control" name="mobile_id">
            <option value=""></option>
            @foreach($shift->mobilesInService as $mis)
            <option value="{{ $mis->mobile->id }}" {{ old('mobile_id', optional($event)->mobile_id) == $mis->mobile->id ? 'selected' : '' }}>
                {{ $mis->mobile->code }} {{ $mis->mobile->name }} (PROPIO)
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
        <input type="text" class="form-control" name="external_crew" value="{{ ( $event &&  $event->external_crew)? $event->external_crew : '' }}">
    </fieldset>

</div>
            
<div class="form-row">

    <fieldset class="form-group col-md-1">
        <label for="for_departure_at">Salida</label>
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
        <input type="text" class="form-control" name="address" value="{{ ( $event &&  $event->address)? $event->address : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_commune">Comuna</label>
        <select class="form-control" name="commune_id">
            <option value=""></option>
            @foreach($communes as $name => $id)
            <option value="{{ $id }}" {{ old('commune_id', optional($event)->commune_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
            @endforeach 
        </select>
    </fieldset>

</div>


<hr>



<!-- Inicio evaluacion de paciente-->
<h4>Datos del paciente</h4>
<div class="form-row">

    <fieldset class="form-check form-check-inline col-1">
        <input class="form-check-input" type="checkbox" name="patient_unknown" 
            id="patient_unknown" value="1" {{ ( $event &&  $event->patient_unknown)? 'checked' : '' }}>
        <label class="form-check-label" for="patient_unknown">No identificado</label>
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_patient_name">Nombre del paciente</label>
        <input type="text" class="form-control" name="patient_name" 
            value="{{ ( $event &&  $event->patient_name)? $event->patient_name : '' }}">
    </fieldset>

    <fieldset class="form-group col-12 col-md-2">
        <label for="for_identifierType">Tipo de identificación</label>
        <select class="form-control" name="patient_identifier_type_id" id="patient_identifier_type_id">
            <option> </option>
            @foreach($identifierTypes as $text => $id)
                <option value="{{ $id }}" {{ old('patient_identifier_type_id', optional($event)->patient_identifier_type_id) == $id ? 'selected' : '' }}>{{ $text }}</option>
            @endforeach
        </select>
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_patient_identification">Identificación</label>
        <input type="text" class="form-control" name="patient_identification" 
            value="{{ ( $event &&  $event->patient_identification)? $event->patient_identification : '' }}"
            placeholder="sin puntos ni guión">
    </fieldset>

</div>


<hr>


<h4>Evaluación </h4>
<div class="form-row">

    <div class="col-8">
        <div class="form-row">
            <fieldset class="form-group col-md-12">
                <label for="for_reception_detail">Detalle de recepción</label>                                
                <textarea class="form-control" rows="8" name="reception_detail">{{ ( $event &&  $event->reception_detail)? $event->reception_detail : '' }}</textarea>
            </fieldset>
        </div>
    </div>

    <div class="col-4">
        <div class="form-row">
            <fieldset class="form-group col-md-12">
                <label for="for_establishment">Establecimiento recepción pcte.</label>
                <select class="form-control" name="establishment_id" id="establishment_id">
                    <option> </option>
                    @foreach($establishments as $name => $id)
                        <option value="{{ $id }}" {{ old('establishment_id', optional($event)->establishment_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group col-12 col-md-6">
                <label for="for_rau">Registro Atención Urgencia</label>
                <input type="text" class="form-control" name="rau" value="{{ ( $event &&  $event->rau)? $event->rau : '' }}">
            </fieldset>

            <fieldset class="form-group col-md-6">
                <label for="for_reception_place_id">Otro lugar de recepción</label>
                <select class="form-control" name="reception_place_id" id="reception_place_id">
                    <option> </option>
                    @foreach($receptionPlaces as $name => $id)
                        <option value="{{ $id }}" {{ old('reception_place_id', optional($event)->reception_place_id) == $id ? 'selected' : '' }}>{{ $name }}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group col-md-12">
                <label for="for_reception_person">Personal recepción pcte.</label>
                <input type="text" class="form-control" name="reception_person" value="{{ ( $event &&  $event->reception_person)? $event->reception_person : '' }}">
            </fieldset>

        </div>
    </div>


</div>
<!--fin evaluacion paciente-->

<hr>

<h4> Asignación Signos Vitales</h4>

<div class="form-row">
    <fieldset class="form-group col-md-1">
        <label for="for_fc">Frecuencia Cardiaca</label>
        <input type="number" class="form-control" name="fc" value="{{ ( $event &&  $event->fc)? $event->fc : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_fr">Frecuencia Respiratoria</label>
        <input type="number" class="form-control" name="fr" value="{{ ( $event &&  $event->fr)? $event->fr : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_pa">Presión <br>Arterial</label>
        <input type="text" class="form-control" name="pa" value="{{ ( $event &&  $event->pa)? $event->pa : '' }}" 
            placeholder="xxx/xx">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_pam">Presión Arterial Media</label>
        <input type="text" class="form-control" name="pam" value="{{ ( $event &&  $event->pam)? $event->pam : '' }}"
            placeholder="xxx/xx">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_gl">Glasgow<br>&nbsp;</label>
        <input type="number" class="form-control" name="gl" value="{{ ( $event &&  $event->gl)? $event->gl : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_soam">% Saturacion Oxigeno/Ambi.</label>
        <input type="number" class="form-control" name="soam" value="{{ ( $event &&  $event->soam)? $event->soam : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_soap">% Saturación Oxigeno/Apoyo</label>
        <input type="number" class="form-control" name="soap" value="{{ ( $event &&  $event->soap)? $event->soap : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_hgt">HGT <br>mg/dl</label>
        <input type="number" class="form-control" name="hgt" value="{{ ( $event &&  $event->hgt)? $event->soap : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_fill_capillary">Llene <br>Capilar</label>
        <input type="number" class="form-control" name="fill_capillary" value="{{ ( $event &&  $event->fill_capillary)? $event->fill_capillary : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_t">Temperatura <br>°C</label>
        <input type="number" class="form-control" name="t" value="{{ ( $event &&  $event->t)? $event->t : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="for_treatment">Tratamiento</label>
        <textarea class="form-control" rows="6" name="treatment">{{ ( $event &&  $event->treatment)? $event->treatment : '' }}</textarea>
    </fieldset>
    <fieldset class="form-group col-md-8">
        <label for="for_observation_sv">Observación </label>
        <textarea class="form-control" rows="6" name="observation_sv">{{ ( $event &&  $event->observation_sv)? $event->observation_sv : '' }}</textarea>
    </fieldset>             
</div>
<!-- fin de seguimeinto-->

<button type="submit" class="btn btn-primary" >Guardar</button>

<a href="{{ route('samu.event.index') }}" class="btn btn-outline-secondary">Cancelar</a>