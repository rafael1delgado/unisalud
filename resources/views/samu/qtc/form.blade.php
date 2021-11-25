<div class="form-row">

    <fieldset class="form-group col-md-2">
        <label for="for_key">Clave</label>
        <select class="form-control" name="key_id">
            <option value=""></option>
            @foreach($keys as $key)
            <option value="{{ $key->id }}" {{ old('key_id', optional($qtc)->key_id) == $key->id ? 'selected' : '' }}>{{ $key->key }}  - {{ $key->name }}</option>
            @endforeach 
        </select>
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for_return">Clave de Retorno</label>
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
        <select class="form-control" name="mobile_in_service_id">
            <option value=""></option>
            @foreach($shift->mobilesInService as $mis)
            <option value="{{ $mis->id }}" {{ old('mobile_in_service_id', optional($qtc)->mobile_in_service_id) == $mis->id ? 'selected' : '' }}>{{ $mis->mobile->name }}</option>
            @endforeach 
        </select>
    </fieldset>

    <fieldset class="form-group col-md-6">
        <label for="for_observation">Observacion </label>
        <input type="text" class="form-control" name="observation" value="{{ ( $qtc &&  $qtc->observation)? $qtc->observation : '' }}">
    </fieldset>

</div>
            
<div class="form-row">

    <fieldset class="form-group col-md-1">
        <label for="for_departure_time">Salida </label>
        <input type="time" class="form-control" name="departure_time" value="{{ ( $qtc &&  $qtc->departure_time)? $qtc->departure_time : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_mobile_departure_time">Salida Movil </label>
        <input type="time" class="form-control" name="mobile_departure_time" value="{{ ( $qtc &&  $qtc->mobile_departure_time)? $qtc->mobile_departure_time : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_mobile_arrival_place">Llegada al Lugar</label>
        <input type="time" class="form-control" name="mobile_arrival_place" value="{{ ( $qtc &&  $qtc->mobile_arrival_place)? $qtc->mobile_arrival_place : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_route_ca">Ruta C.Asistencial </label>
        <input type="time" class="form-control" name="route_ca" value="{{ ( $qtc &&  $qtc->route_ca)? $qtc->route_ca : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_mobile_ca">Centro asistencial</label>
        <input type="time" class="form-control" name="mobile_ca" value="{{ ( $qtc &&  $qtc->mobile_ca)? $qtc->mobile_ca : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_patient_reception">Recepción de Pcte</label>
        <input type="time" class="form-control" name="patient_reception" value="{{ ( $qtc &&  $qtc->patient_reception)? $qtc->patient_reception : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_return_base">Retorno base</label>
        <input type="time" class="form-control" name="return_base" value="{{ ( $qtc &&  $qtc->return_base)? $qtc->return_base : '' }}">
    </fieldset>

    <fieldset class="form-group col-md-1">
        <label for="for_mobile_base">Móvil en base</label>
        <input type="time" class="form-control" name="mobile_base" value="{{ ( $qtc &&  $qtc->mobile_base)? $qtc->mobile_base : '' }}">
    </fieldset>
        
</div>



<hr>



<!-- inicio evaluacion de paciente-->
<h4>Evaluación del paciente</h4>

<div class="form-row">

    <div class="col-8">
        <div class="form-row">
            <fieldset class="form-group col-md-12">
                <label for="for_reception_detail">Detalle de Recepción </label>                                
                <textarea class="form-control" rows="6" name="reception_detail">{{ ( $qtc &&  $qtc->reception_detail)? $qtc->reception_detail : '' }}</textarea>
            </fieldset>
        </div>
    </div>

    <div class="col-4">
        <div class="form-row">
            <fieldset class="form-group col-md-12">
                <label for="for_establishment">Est. Recepcion de paciente </label>
                <select class="form-control" name="establishment_id" id="establishment_id">
                    <option> </option>
                    @foreach($establishments as $id => $establishment)
                        <option value="{{ $id }}" {{ old('establishment_id', optional($qtc)->establishment_id) == $id ? 'selected' : '' }}>{{ $establishment }}</option>
                    @endforeach
                </select>
            </fieldset>

            <fieldset class="form-group col-md-12">
                <label for="for_reception_person">Personal Recepcion del Pcte.</label>
                <input type="text" class="form-control" name="reception_person" value="{{ ( $qtc &&  $qtc->reception_person)? $qtc->reception_person : '' }}">
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
        <label for="for_fr">Frecuencia Respiratoria </label>
        <input type="number" class="form-control" name="fr" value="{{ ( $qtc &&  $qtc->fr)? $qtc->fr : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_pa">Presión <br>Arterial</label>
        <input type="number" class="form-control" name="pa" value="{{ ( $qtc &&  $qtc->pa)? $qtc->pa : '' }}">
    </fieldset>
    <fieldset class="form-group col-md-1">
        <label for="for_pam">Presión Arterial Media</label>
        <input type="number" class="form-control" name="pam" value="{{ ( $qtc &&  $qtc->pam)? $qtc->pam : '' }}">
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