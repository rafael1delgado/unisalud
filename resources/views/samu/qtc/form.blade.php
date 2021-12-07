<div class="form-row">

    <fieldset class="form-group col-md-2">
        <label for="for_key">Clave*</label>
        <select class="form-control" name="key_id" required>
            <option value=""></option>
            @foreach($keys as $key)
            <option value="{{ $key->id }}" {{ old('key_id', optional($qtc)->key_id) == $key->id ? 'selected' : '' }}>{{ $key->key }}  - {{ $key->name }}</option>
            @endforeach 
        </select>
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_return">Clave de retorno</label>
        <select class="form-control" name="return_key_id">
            <option value=""></option>
            @foreach($keys as $key)
            <option value="{{ $key->id }}" {{ old('return_key_id', optional($qtc)->return_key_id) == $key->id ? 'selected' : '' }}>{{ $key->key }}  - {{ $key->name }}</option>
            @endforeach 
        </select>
    </fieldset>
                                
    <fieldset class="form-group col-md-2">                        
        <!--revisar foreach-->
        <label for="for_mobile">Móvil</label>
        <select class="form-control" name="mobile_id">
            <option value=""></option>
            @foreach($shift->mobilesInService as $mis)
            <option value="{{ $mis->mobile->id }}" {{ old('mobile_id', optional($qtc)->mobile_id) == $mis->mobile->id ? 'selected' : '' }}>
                {{ $mis->mobile->code }} {{ $mis->mobile->name }} (PROPIO)
            </option>
            @endforeach 
            @foreach($mobiles as $mobile)
            <option value="{{ $mobile->id }}" {{ old('mobile_id', optional($qtc)->mobile_id) == $mobile->id ? 'selected' : '' }}>
                {{ $mobile->code }} {{ $mobile->name }}
            </option>
            @endforeach
        </select>
    </fieldset>

    <fieldset class="form-group col-md-6">
        <label for="for_observation">Observación</label>
        <input type="text" class="form-control" name="observation" value="{{ ( $qtc &&  $qtc->observation)? $qtc->observation : '' }}">
    </fieldset>

</div>
            
<div class="form-row">

    <fieldset class="form-group col-md-1">
        <label for="for_departure_at">Salida</label>
        <input type="time" class="form-control" name="departure_at" value="{{ ( $qtc &&  $qtc->departure_at)? $qtc->departure_at : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_mobile_departure_at">Salida móvil</label>
        <input type="time" class="form-control" name="mobile_departure_at" value="{{ ( $qtc &&  $qtc->mobile_departure_at)? $qtc->mobile_departure_at : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_mobile_arrival_at">Llegada al lugar</label>
        <input type="time" class="form-control" name="mobile_arrival_at" value="{{ ( $qtc &&  $qtc->mobile_arrival_at)? $qtc->mobile_arrival_at : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_route_to_healtcenter_at">Ruta c.asistencial </label>
        <input type="time" class="form-control" name="route_to_healtcenter_at" value="{{ ( $qtc &&  $qtc->route_to_healtcenter_at)? $qtc->route_to_healtcenter_at : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_healthcenter_at">Centro asistencial</label>
        <input type="time" class="form-control" name="healthcenter_at" value="{{ ( $qtc &&  $qtc->healthcenter_at)? $qtc->healthcenter_at : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_patient_reception_at">Recepción de pcte</label>
        <input type="time" class="form-control" name="patient_reception_at" value="{{ ( $qtc &&  $qtc->patient_reception_at)? $qtc->patient_reception_at : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_return_base_at">Retorno base</label>
        <input type="time" class="form-control" name="return_base_at" value="{{ ( $qtc &&  $qtc->return_base_at)? $qtc->return_base_at : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_on_base_at">Móvil en base</label>
        <input type="time" class="form-control" name="on_base_at" value="{{ ( $qtc &&  $qtc->on_base_at)? $qtc->on_base_at : '' }}">
    </fieldset>
        
</div>



<hr>



<!-- inicio evaluacion de paciente-->
<h4>Datos del paciente</h4>
<div class="form-row">

    <fieldset class="form-check form-check-inline col-1">
        <input class="form-check-input" type="checkbox" name="patient_unknown" 
            id="patient_unknown" value="1" {{ ( $qtc &&  $qtc->patient_unknown)? 'checked' : '' }}>
        <label class="form-check-label" for="patient_unknown">No identificado</label>
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_patient_name">Nombre del paciente</label>
        <input type="text" class="form-control" name="patient_name" 
            value="{{ ( $qtc &&  $qtc->patient_name)? $qtc->patient_name : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for_patient_identification">Identificación</label>
        <input type="text" class="form-control" name="patient_identification" 
            value="{{ ( $qtc &&  $qtc->patient_identification)? $qtc->patient_identification : '' }}"
            placeholder="run:123234 , dni:12313, pasaporte:123123">
    </fieldset>

</div>

<hr>

<h4>Evaluación </h4>
<div class="form-row">

    <div class="col-8">
        <div class="form-row">
            <fieldset class="form-group col-md-12">
                <label for="for_reception_detail">Detalle de recepción</label>                                
                <textarea class="form-control" rows="8" name="reception_detail">{{ ( $qtc &&  $qtc->reception_detail)? $qtc->reception_detail : '' }}</textarea>
            </fieldset>
        </div>
    </div>

    <div class="col-4">
        <div class="form-row">
            <fieldset class="form-group col-md-12">
                <label for="for_establishment">Establecimiento recepción pcte.</label>
                <select class="form-control" name="establishment_id" id="establishment_id">
                    <option> </option>
                    @foreach($establishments as $id => $establishment)
                        <option value="{{ $id }}" {{ old('establishment_id', optional($qtc)->establishment_id) == $id ? 'selected' : '' }}>{{ $establishment }}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group col-md-12">
                <label for="for_reception_person">Personal recepción pcte.</label>
                <input type="text" class="form-control" name="reception_person" value="{{ ( $qtc &&  $qtc->reception_person)? $qtc->reception_person : '' }}">
            </fieldset>

            <fieldset class="form-group col-12 col-md-6">
                <label for="for_rau">Registro Atención Urgencia</label>
                <input type="text" class="form-control" name="rau" value="{{ ( $qtc &&  $qtc->rau)? $qtc->rau : '' }}">
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
        <input type="number" class="form-control" name="fc" value="{{ ( $qtc &&  $qtc->fc)? $qtc->fc : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_fr">Frecuencia Respiratoria</label>
        <input type="number" class="form-control" name="fr" value="{{ ( $qtc &&  $qtc->fr)? $qtc->fr : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_pa">Presión <br>Arterial</label>
        <input type="number" class="form-control" name="pa" value="{{ ( $qtc &&  $qtc->pa)? $qtc->pa : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_pam">Presión Arterial Media</label>
        <input type="text" class="form-control" name="pam" value="{{ ( $qtc &&  $qtc->pam)? $qtc->pam : '' }}"
            placeholder="xxx/xx">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_gl">Glasgow<br>&nbsp;</label>
        <input type="number" class="form-control" name="gl" value="{{ ( $qtc &&  $qtc->gl)? $qtc->gl : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_soam">% Saturacion Oxigeno/Ambi.</label>
        <input type="number" class="form-control" name="soam" value="{{ ( $qtc &&  $qtc->soam)? $qtc->soam : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_soap">% Saturación Oxigeno/Apoyo</label>
        <input type="number" class="form-control" name="soap" value="{{ ( $qtc &&  $qtc->soap)? $qtc->soap : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_hgt">HGT <br>mg/dl</label>
        <input type="number" class="form-control" name="hgt" value="{{ ( $qtc &&  $qtc->hgt)? $qtc->soap : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_fill_capillary">Llene <br>Capilar</label>
        <input type="number" class="form-control" name="fill_capillary" value="{{ ( $qtc &&  $qtc->fill_capillary)? $qtc->fill_capillary : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_t">Temperatura <br>°C</label>
        <input type="number" class="form-control" name="t" value="{{ ( $qtc &&  $qtc->t)? $qtc->t : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-4">
        <label for="for_treatment">Tratamiento</label>
        <textarea class="form-control" rows="6" name="treatment">{{ ( $qtc &&  $qtc->treatment)? $qtc->treatment : '' }}</textarea>
    </fieldset>
    <fieldset class="form-group col-md-8">
        <label for="for_observation_sv">Observación </label>
        <textarea class="form-control" rows="6" name="observation_sv">{{ ( $qtc &&  $qtc->observation_sv)? $qtc->observation_sv : '' }}</textarea>
    </fieldset>             
</div>
<!-- fin de seguimeinto-->

<button type="submit" class="btn btn-primary" >Guardar</button>

<a href="{{ route('samu.qtc.index') }}" class="btn btn-outline-secondary">Cancelar</a>