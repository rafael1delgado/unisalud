@extends('layouts.app')

@section('content')

<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">
        
        <!-- seguimiento-->
        <h3><b><b></h3>
            
            <h4> Asignación de seguimiento horario</h4>
            <form method="post" action="{{ route('samu.follow.store') }}">
                @csrf
                @method('POST')
                        <div class="form-row">
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_key">Clave</label>
                                        <select class="form-control" name="key">
                                        @foreach($keys as $key)
                                            <option value="{{ $qtc->follow->key === '$key' ? 'selected' : '' }}">{{$key->key_code}}  - {{$key->name_key_code}} </option>
                                        
                                        @endforeach  
                                        </select>
                                       <!-- <input type="text" class="form-control" name="key" value="{{ ( $qtc->follow &&  $qtc->follow->key)? $qtc->follow->key : '' }}">-->
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_return">Clave de Retorno</label>
                                        <select class="form-control" name="key">
                                        @foreach($keys as $key)
                                            <option value="{{ $qtc->follow->key_return === '$key' ? 'selected' : '' }}">{{$key->key_code}} - {{$key->name_key_code}} </option>
                                        
                                        @endforeach  
                                        </select>
                                        
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile">Movil</label>
                                            <select class="form-control" name="mobile" id="mobile">
                                                <option value="">Seleccione Movil </option>
                                                <option value="Movil 2" >Movil 2</option>
                                                <option value="Movil 5" >Movil 5</option>
                                                <option value="Movil 12" >Movil 12</option>
                                                <option value="Movil 6" >Movil 6</option>
                                                <option value="Movil 4" >Movil 4</option>
                                                <option value="Movil 11" >Movil 11</option>
                                            
                                            </select>
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_transfer_type">Tipo de Traslado </label>
                                        <select class="form-control" name="transfer_type" id="transfer_type">
                                                
                                                <option value="T1" {{ $qtc->follow->transfer_type === 'T1' ? 'selected' : '' }} >T1</option>
                                                <option value="T2" {{ $qtc->follow->transfer_type === 'T2' ? 'selected' : '' }}  >T2</option>
                                                <option value="RU1"{{ $qtc->follow->transfer_type === 'RU1' ? 'selected' : '' }} >RU1</option>
                                                <option value="RU2" {{ $qtc->follow->transfer_type === 'RU2' ? 'selected' : '' }}  >RU2</option>
                                                <option value="NM"{{ $qtc->follow->transfer_type === 'NM' ? 'selected' : '' }} >NM</option>
                                                <option value="Otro"{{ $qtc->follow->transfer_type === 'Otro' ? 'selected' : '' }} >Otro</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_departure_time">Hora Salida </label>
                                        <input type="time" class="form-control" name="departure_time" value="{{ ( $qtc->follow &&  $qtc->follow->departure_time)? $qtc->follow->departure_time : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_departure_time">Hora Salida Movil </label>
                                        <input type="time" class="form-control" name="mobile_departure_time" value="{{ ( $qtc->follow &&  $qtc->follow->mobile_departure_time)? $qtc->follow->mobile_departure_time : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_arrival_place">Llegada Movil Lugar </label>
                                        <input type="time" class="form-control" name="mobile_arrival_place" value="{{ ( $qtc->follow &&  $qtc->follow->mobile_arrival_place)? $qtc->follow->mobile_arrival_place : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_route_ca">Ruta C.Asistencial </label>
                                        <input type="time" class="form-control" name="route_ca" value="{{ ( $qtc->follow &&  $qtc->follow->route_ca)? $qtc->follow->route_ca : '' }}">
                                    </fieldset>
                    </div>
                    
                    <div class="form-row">
                           
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_ca">Movil en centro asistencial</label>
                                        <input type="time" class="form-control" name="mobile_ca" value="{{ ( $qtc->follow &&  $qtc->follow->mobile_ca)? $qtc->follow->mobile_ca : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_patient_reception">Recepcion de Pcte </label>
                                        <input type="time" class="form-control" name="patient_reception" value="{{ ( $qtc->follow &&  $qtc->follow->patient_reception)? $qtc->follow->patient_reception : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_return_base">Retorno a base </label>
                                        <input type="time" class="form-control" name="return_base" value="{{ ( $qtc->follow &&  $qtc->follow->return_base)? $qtc->follow->return_base : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_base">Movil en base</label>
                                        <input type="time" class="form-control" name="mobile_base" value="{{ ( $qtc->follow &&  $qtc->follow->mobile_base)? $qtc->follow->mobile_base : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-4">
                                        <label for="for_observation">Observacion </label>
                                        <input type="text" class="form-control" name="observation" value="{{ ( $qtc->follow &&  $qtc->follow->observation)? $qtc->follow->observation : '' }}">
                                    </fieldset>
                                    </fieldset>
                                
                    </div>
                    <div class="form-row">
                                <fieldset class="form-group col-md-2">
                                    <label for="for_guardar_hours"></label>
                                    <input hidden name="qtc_id" value="{{$qtc->id}}"> 
                                    <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                                </fieldset>
                        </div>
        </form>

<!-- inicio evaluacion de paciente-->
            <hr>
            <form method="post" action="{{ route('samu.follow.update', $qtc->follow) }}">
                @csrf
                @method('PUT')

                    <h4>Evaluación de paciente</h4>
                    <div class="form-row">
                        <div class=" col-md-6">
                        <label for="for_reception_detail">Detalle de Recepción </label>                                
                        <textarea class="form-control" style="height: 100px" name="reception_detail">{{ ( $qtc->follow &&  $qtc->follow->reception_detail)? $qtc->follow->reception_detail : '' }}</textarea>
                        </div>
                        <fieldset class="form-group  col-md-3">
                                    <label for="for_establishment">Est. Recepcion de paciente </label>
                                    <select class="form-control" name="establishment" id="establishment">
                                        
                                            <option>Seleccione </option>
                                            <option value="Hospital Dr Ernesto Torres Galdames" {{ $qtc->follow->establishment === 'Hospital Dr Ernesto Torres Galdames' ? 'selected' : '' }} >Hospital Dr Ernesto Torres Galdames</option>
                                            <option value="SAPU Cirujano Aguirre" {{ $qtc->follow->establishment === 'SAPU Cirujano Aguirre' ? 'selected' : '' }}>SAPU Cirujano Aguirre</option>
                                            <option value="SAPU Cirujano Guzmán" {{ $qtc->follow->establishment === 'SAPU Cirujano Guzmán' ? 'selected' : '' }}>SAPU Cirujano Guzmán</option>
                                            <option value="SAPU Cirujano Videla" {{ $qtc->follow->establishment === 'SAPU Cirujano Videla' ? 'selected' : '' }}>SAPU Cirujano Videla</option>
                                            <option value="SAPU El Boro" {{ $qtc->follow->establishment === 'SAPU El Boro' ? 'selected' : '' }}>SAPU El Boro</option>
                                            <option value="SAPU Huara" {{ $qtc->follow->establishment === 'SAPU Huara' ? 'selected' : '' }}>SAPU Huara</option>
                                            <option value="SAPU Pedro Pulgar" {{ $qtc->follow->establishment === 'SAPU Pedro Pulgar' ? 'selected' : '' }}>SAPU Pedro Pulgar</option>
                                            <option value="SAPU Pozo Almonte" {{ $qtc->follow->establishment === 'SAPU Pozo Almonte' ? 'selected' : '' }}>SAPU Pozo Almonte</option>
                                            <option value="SAR La Tortuga" {{ $qtc->follow->establishment === 'SAR La Tortuga' ? 'selected' : '' }}>SAR La Tortuga</option>
                                            <option value="SAR Sur de Iquique" {{ $qtc->follow->establishment === 'SAR Sur de Iquique' ? 'selected' : '' }}>SAR Sur de Iquique</option>
                                            <option value="Servicio Médico Legal Iquique" {{ $qtc->follow->establishment === 'Servicio Médico Legal Iquique' ? 'selected' : '' }}>Servicio Médico Legal Iquique</option>
                                            <option value="SMA Servicios Medicos" {{ $qtc->follow->establishment === 'SMA Servicios Medicos' ? 'selected' : '' }}>SMA Servicios Medicos</option>
                                            <option value="SUR Camiña" {{ $qtc->follow->establishment === 'SUR Camiña' ? 'selected' : '' }}>SUR Camiña</option>
                                            <option value="SUR Cariquima" {{ $qtc->follow->establishment === 'SUR Cariquima' ? 'selected' : '' }}>SUR Cariquima</option>
                                            <option value="SUR Chanavayita" {{ $qtc->follow->establishment === 'SUR Chanavayita' ? 'selected' : '' }}>SUR Chanavayita</option>
                                            <option value="SUR Colchane" {{ $qtc->follow->establishment === 'SUR Colchane' ? 'selected' : '' }}>SUR Colchane</option>
                                            <option value="SUR Pica" {{ $qtc->follow->establishment === 'SUR Pica' ? 'selected' : '' }}>SUR Pica</option>
                                            <option value="SUR Tarapacá" {{ $qtc->follow->establishment === 'SUR Tarapacá' ? 'selected' : '' }}>SUR Tarapacá</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group  col-md-3">
                                    <label for="for_reception_person">Personal Recepcion del Pcte.</label>
                                    <input type="text" class="form-control" name="reception_person" value="{{ ( $qtc->follow &&  $qtc->follow->reception_person)? $qtc->follow->reception_person : '' }}">
                                </fieldset>
                    
                        
                    </div>
                        <!--fin evaluacion paciente-->
                            <hr>
                            <h4> Asignación Signos Vitales</h4>

                            <div class="form-row">
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_fc">Frecuencia Cardiaca</label>
                                            <input type="number" class="form-control" name="fc" value="{{ ( $qtc->follow &&  $qtc->follow->fc)? $qtc->follow->fc : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_fr">Frecuencia Respiratoria </label>
                                            <input type="number" class="form-control" name="fr" value="{{ ( $qtc->follow &&  $qtc->follow->fr)? $qtc->follow->fr : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_pa">Presión Arterial</label>
                                            <input type="number" class="form-control" name="pa" value="{{ ( $qtc->follow &&  $qtc->follow->pa)? $qtc->follow->pa : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_pam">Presión Arterial Media</label>
                                            <input type="number" class="form-control" name="pam" value="{{ ( $qtc->follow &&  $qtc->follow->pam)? $qtc->follow->pam : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_gl">Glasgow</label>
                                            <input type="number" class="form-control" name="gl" value="{{ ( $qtc->follow &&  $qtc->follow->gl)? $qtc->follow->gl : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_soam">% Saturacion Oxigeno Ambiental</label>
                                            <input type="number" class="form-control" name="soam" value="{{ ( $qtc->follow &&  $qtc->follow->soam)? $qtc->follow->soam : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_soap">% Saturación Oxigeno/Apoyo</label>
                                            <input type="number" class="form-control" name="soap" value="{{ ( $qtc->follow &&  $qtc->follow->soap)? $qtc->follow->soap : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_hgt">HGT mg/dl</label>
                                            <input type="number" class="form-control" name="hgt" value="{{ ( $qtc->follow &&  $qtc->follow->hgt)? $qtc->follow->soap : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_fill_capillary">Llene Capilar</label>
                                            <input type="number" class="form-control" name="fill_capillary" value="{{ ( $qtc->follow->follow &&  $qtc->fill_capillary)? $qtc->follow->fill_capillary : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_t">Temperatura °C</label>
                                            <input type="number" class="form-control" name="t" value="{{ ( $qtc->follow &&  $qtc->follow->t)? $qtc->follow->t : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-4">
                                            <label for="for_treatment">Tratamiento</label>
                                            <input type="text" class="form-control" name="treatment" value="{{ ( $qtc->follow &&  $qtc->follow->treatment)? $qtc->follow->treatment : '' }}">
                                        </fieldset>
                                        <div class=" col-md-12">
                                            <label for="for_observation_sv">Observación </label>
                                            <textarea class="form-control" style="height: 100px" name="observation_sv">{{ ( $qtc->follow &&  $qtc->follow->observation_sv)? $qtc->follow->observation_sv : '' }}</textarea>
                                        </div>                   
                        </div>
                        <div class="form-row mb-3">
                                    <fieldset class="form-group col-md-2 mt-3 ">
                                        <label for="for_guardar"></label>
                                        <input hidden name="qtc_id" value="{{$qtc->id}}"> 
                                        <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                                    </fieldset>
                            </div>       

            </form>

            <!-- fin de seguimeinto-->

     </div>
</div>



@endsection