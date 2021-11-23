<h4> Asignación de seguimiento y horarios</h4>
      
<form method="post" action="{{ route('samu.qtc.update', $call->qtc) }}">
    @csrf
    @method('PUT')

    <div class="form-row">

        <fieldset class="form-group col-md-2">
            <label for="for_key">Clave</label>
            <select class="form-control" name="key_id">
                <option value=""></option>
                @foreach($keys as $key)
                <option value="{{ $call->qtc->key === $key ? 'selected' : '' }}">{{ $key->key }}  - {{ $key->name }}</option>
                @endforeach  
            </select>
        </fieldset>

        <fieldset class="form-group col-md-2">
            <label for="for_return">Clave de Retorno</label>
            <select class="form-control" name="return_key_id">
                <option value=""></option>
                @foreach($keys as $key)
                <option value="{{ $call->qtc->key === $key ? 'selected' : '' }}">{{ $key->key }} - {{ $key->name }}</option>
                @endforeach  
            </select>
        </fieldset>
                                    
        <fieldset class="form-group col-md-2">                        
            <!--revisar foreach-->
            <label for="for_mobile">Móvil</label>
            <select class="form-control" name="mobile">
                <option value=""></option>
                @foreach($mobilesInServices as $mis)
                    <option value="{{ $call->qtc->mis === $mis ? 'selected' : '' }}">{{ $mis->mobile->name }} </option>
                @endforeach 
            </select>
        </fieldset>

        <fieldset class="form-group col-md-6">
            <label for="for_observation">Observacion </label>
            <input type="text" class="form-control" name="observation" value="{{ ( $call->qtc &&  $call->qtc->observation)? $call->qtc->observation : '' }}">
        </fieldset>

    </div>
                    
    <div class="form-row">

        <fieldset class="form-group col-md-1">
            <label for="for_departure_time">Salida </label>
            <input type="time" class="form-control" name="departure_time" value="{{ ( $call->qtc &&  $call->qtc->departure_time)? $call->qtc->departure_time : '' }}">
        </fieldset>

        <fieldset class="form-group col-md-1">
            <label for="for_mobile_departure_time">Salida Movil </label>
            <input type="time" class="form-control" name="mobile_departure_time" value="{{ ( $call->qtc &&  $call->qtc->mobile_departure_time)? $call->qtc->mobile_departure_time : '' }}">
        </fieldset>

        <fieldset class="form-group col-md-1">
            <label for="for_mobile_arrival_place">Llegada al Lugar</label>
            <input type="time" class="form-control" name="mobile_arrival_place" value="{{ ( $call->qtc &&  $call->qtc->mobile_arrival_place)? $call->qtc->mobile_arrival_place : '' }}">
        </fieldset>

        <fieldset class="form-group col-md-1">
            <label for="for_route_ca">Ruta C.Asistencial </label>
            <input type="time" class="form-control" name="route_ca" value="{{ ( $call->qtc &&  $call->qtc->route_ca)? $call->qtc->route_ca : '' }}">
        </fieldset>
    
        <fieldset class="form-group col-md-1">
            <label for="for_mobile_ca">Centro asistencial</label>
            <input type="time" class="form-control" name="mobile_ca" value="{{ ( $call->qtc &&  $call->qtc->mobile_ca)? $call->qtc->mobile_ca : '' }}">
        </fieldset>

        <fieldset class="form-group col-md-1">
            <label for="for_patient_reception">Recepción de Pcte</label>
            <input type="time" class="form-control" name="patient_reception" value="{{ ( $call->qtc &&  $call->qtc->patient_reception)? $call->qtc->patient_reception : '' }}">
        </fieldset>

        <fieldset class="form-group col-md-1">
            <label for="for_return_base">Retorno base</label>
            <input type="time" class="form-control" name="return_base" value="{{ ( $call->qtc &&  $call->qtc->return_base)? $call->qtc->return_base : '' }}">
        </fieldset>

        <fieldset class="form-group col-md-1">
            <label for="for_mobile_base">Móvil en base</label>
            <input type="time" class="form-control" name="mobile_base" value="{{ ( $call->qtc &&  $call->qtc->mobile_base)? $call->qtc->mobile_base : '' }}">
        </fieldset>


                
    </div>


    <hr>

    <!-- inicio evaluacion de paciente-->
    <h4>Evaluación del paciente</h4>

    <div class="row">

        <div class="col-8">
            <div class="form-row">
                <fieldset class="form-group col-md-12">
                    <label for="for_reception_detail">Detalle de Recepción </label>                                
                    <textarea class="form-control" rows="6" name="reception_detail">{{ ( $call->qtc &&  $call->qtc->reception_detail)? $call->qtc->reception_detail : '' }}</textarea>
                </fieldset>
            </div>
        </div>

        <div class="col-4">
            <div class="form-row">
                <fieldset class="form-group col-md-12">
                    <label for="for_establishment">Est. Recepcion de paciente </label>
                    <select class="form-control" name="establishment" id="establishment">
                        <option> </option>
                        <option value="Hospital Dr Ernesto Torres Galdames" {{ $call->qtc->establishment === 'Hospital Dr Ernesto Torres Galdames' ? 'selected' : '' }} >Hospital Dr Ernesto Torres Galdames</option>
                        <option value="SAPU Cirujano Aguirre" {{ $call->qtc->establishment=== 'SAPU Cirujano Aguirre' ? 'selected' : '' }}>SAPU Cirujano Aguirre</option>
                        <option value="SAPU Cirujano Guzmán" {{ $call->qtc->establishment === 'SAPU Cirujano Guzmán' ? 'selected' : '' }}>SAPU Cirujano Guzmán</option>
                        <option value="SAPU Cirujano Videla" {{ $call->qtc->establishment=== 'SAPU Cirujano Videla' ? 'selected' : '' }}>SAPU Cirujano Videla</option>
                        <option value="SAPU El Boro" {{ $call->qtc->establishment=== 'SAPU El Boro' ? 'selected' : '' }}>SAPU El Boro</option>
                        <option value="SAPU Huara" {{ $call->qtc->establishment=== 'SAPU Huara' ? 'selected' : '' }}>SAPU Huara</option>
                        <option value="SAPU Pedro Pulgar" {{ $call->qtc->establishment === 'SAPU Pedro Pulgar' ? 'selected' : '' }}>SAPU Pedro Pulgar</option>
                        <option value="SAPU Pozo Almonte" {{ $call->qtc->establishment === 'SAPU Pozo Almonte' ? 'selected' : '' }}>SAPU Pozo Almonte</option>
                        <option value="SAR La Tortuga" {{ $call->qtc->establishment === 'SAR La Tortuga' ? 'selected' : '' }}>SAR La Tortuga</option>
                        <option value="SAR Sur de Iquique" {{ $call->qtc->establishment === 'SAR Sur de Iquique' ? 'selected' : '' }}>SAR Sur de Iquique</option>
                        <option value="Servicio Médico Legal Iquique" {{ $call->qtc->establishment === 'Servicio Médico Legal Iquique' ? 'selected' : '' }}>Servicio Médico Legal Iquique</option>
                        <option value="SMA Servicios Medicos" {{ $call->qtc->establishment === 'SMA Servicios Medicos' ? 'selected' : '' }}>SMA Servicios Medicos</option>
                        <option value="SUR Camiña" {{ $call->qtc->establishment === 'SUR Camiña' ? 'selected' : '' }}>SUR Camiña</option>
                        <option value="SUR Cariquima" {{ $call->qtc->establishment === 'SUR Cariquima' ? 'selected' : '' }}>SUR Cariquima</option>
                        <option value="SUR Chanavayita" {{ $call->qtc->establishment === 'SUR Chanavayita' ? 'selected' : '' }}>SUR Chanavayita</option>
                        <option value="SUR Colchane" {{ $call->qtc->establishment === 'SUR Colchane' ? 'selected' : '' }}>SUR Colchane</option>
                        <option value="SUR Pica" {{ $call->qtc->establishment === 'SUR Pica' ? 'selected' : '' }}>SUR Pica</option>
                        <option value="SUR Tarapacá" {{ $call->qtc->establishment === 'SUR Tarapacá' ? 'selected' : '' }}>SUR Tarapacá</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-md-12">
                    <label for="for_reception_person">Personal Recepcion del Pcte.</label>
                    <input type="text" class="form-control" name="reception_person" value="{{ ( $call->qtc &&  $call->qtc->reception_person)? $call->qtc->reception_person : '' }}">
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
            <input type="number" class="form-control" name="fc" value="{{ ( $call->qtc &&  $call->qtc->fc)? $call->qtc->fc : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-1">
            <label for="for_fr">Frecuencia Respiratoria </label>
            <input type="number" class="form-control" name="fr" value="{{ ( $call->qtc &&  $call->qtc->fr)? $call->qtc->fr : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-1">
            <label for="for_pa">Presión <br>Arterial</label>
            <input type="number" class="form-control" name="pa" value="{{ ( $call->qtc &&  $call->qtc->pa)? $call->qtc->pa : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-1">
            <label for="for_pam">Presión Arterial Media</label>
            <input type="number" class="form-control" name="pam" value="{{ ( $call->qtc &&  $call->qtc->pam)? $call->qtc->pam : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-1">
            <label for="for_gl">Glasgow<br>&nbsp;</label>
            <input type="number" class="form-control" name="gl" value="{{ ( $call->qtc &&  $call->qtc->gl)? $call->qtc->gl : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-1">
            <label for="for_soam">% Saturacion Oxigeno/Ambi.</label>
            <input type="number" class="form-control" name="soam" value="{{ ( $call->qtc &&  $call->qtc->soam)? $call->qtc->soam : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-1">
            <label for="for_soap">% Saturación Oxigeno/Apoyo</label>
            <input type="number" class="form-control" name="soap" value="{{ ( $call->qtc &&  $call->qtc->soap)? $call->qtc->soap : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-1">
            <label for="for_hgt">HGT <br>mg/dl</label>
            <input type="number" class="form-control" name="hgt" value="{{ ( $call->qtc &&  $call->qtc->hgt)? $call->qtc->soap : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-1">
            <label for="for_fill_capillary">Llene <br>Capilar</label>
            <input type="number" class="form-control" name="fill_capillary" value="{{ ( $call->qtc &&  $call->qtc->fill_capillary)? $call->qtc->fill_capillary : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-1">
            <label for="for_t">Temperatura <br>°C</label>
            <input type="number" class="form-control" name="t" value="{{ ( $call->qtc &&  $call->qtc->t)? $call->qtc->t : '' }}">
        </fieldset>
        <fieldset class="form-group col-md-4">
            <label for="for_treatment">Tratamiento</label>
            <textarea class="form-control" rows="6" name="treatment">{{ ( $call->qtc &&  $call->qtc->treatment)? $call->qtc->treatment : '' }}</textarea>
        </fieldset>
        <fieldset class="form-group col-md-8">
            <label for="for_observation_sv">Observación </label>
            <textarea class="form-control" rows="6" name="observation_sv">{{ ( $call->qtc &&  $call->qtc->observation_sv)? $call->qtc->observation_sv : '' }}</textarea>
        </fieldset>             
    </div>
    

    <button type="submit" class="btn btn-primary mb-3" >Guardar</button>


</form>
<!-- fin de seguimeinto-->