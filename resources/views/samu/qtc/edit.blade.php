@extends('layouts.app')

@section('content')
@include('nav')


<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">
        
        <!-- seguimiento-->
        <h3><b><b></h3>
        <h3 class="text-danger"><b> Seguimiento</b></h3>
            <h4> Asignación de seguimiento horario</h4>
      
            <form method="post" action="{{ route('samu.qtc.update', $keys) }}">
                @csrf
                @method('POST')
                        <div class="form-row">
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_key">Clave</label>
                                        <select class="form-control" name="key_id">
                                        <option value=""></option>
                                        @foreach($keys as $key)
                                            <option value="{{ $qtc->key === '$key' ? 'selected' : '' }}">{{$key->key}}  - {{$key->name}} </option>
                                        
                                        @endforeach  
                                        </select>
                                      
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_return">Clave de Retorno</label>
                                        <select class="form-control" name="return_key_id">
                                        <option value=""></option>
                                        @foreach($keys as $key)
                                            <option value="{{ $qtc->key === '$key' ? 'selected' : '' }}">{{$key->key}} - {{$key->name}} </option>
                                        
                                        @endforeach  
                                        </select>
                                        
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                       
                                        <!--revisar foreach-->
                                        <label for="for_mobile">Móvil</label>
                                        <select class="form-control" name="mobile">
                                        <option value=""></option>
                                        @foreach($mobilesInService as $mis)
                                            <option value="{{ $qtc->mis === '$mis' ? 'selected' : '' }}">{{$mis->mobile_id}} </option>
                                        
                                        @endforeach 
                                        </select>    
                                         
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_transfer_type">Tipo de Traslado </label>
                                        <select class="form-control" name="transfer_type" id="transfer_type">
                                                <option value=""></option>
                                                <option value="T1" {{ $qtc->transfer_type === 'T1' ? 'selected' : '' }} >T1</option>
                                                <option value="T2" {{ $qtc->transfer_type === 'T2' ? 'selected' : '' }}  >T2</option>
                                                <option value="NM"{{ $qtc->transfer_type === 'NM' ? 'selected' : '' }} >NM</option>
                                                <option value="OT"{{ $qtc->transfer_type === 'OT' ? 'selected' : '' }} >OT</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_departure_time">Hora Salida </label>
                                        <input type="time" class="form-control" name="departure_time" value="{{ ( $qtc &&  $qtc->departure_time)? $qtc->departure_time : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_departure_time">Hora Salida Movil </label>
                                        <input type="time" class="form-control" name="mobile_departure_time" value="{{ ( $qtc &&  $qtc->mobile_departure_time)? $qtc->mobile_departure_time : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_arrival_place">Llegada Movil Lugar </label>
                                        <input type="time" class="form-control" name="mobile_arrival_place" value="{{ ( $qtc &&  $qtc->mobile_arrival_place)? $qtc->mobile_arrival_place : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_route_ca">Ruta C.Asistencial </label>
                                        <input type="time" class="form-control" name="route_ca" value="{{ ( $qtc &&  $qtc->route_ca)? $qtc->route_ca : '' }}">
                                    </fieldset>
                    </div>
                    
                    <div class="form-row">
                           
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_ca">Movil en centro asistencial</label>
                                        <input type="time" class="form-control" name="mobile_ca" value="{{ ( $qtc &&  $qtc->mobile_ca)? $qtc->mobile_ca : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_patient_reception">Recepcion de Pcte </label>
                                        <input type="time" class="form-control" name="patient_reception" value="{{ ( $qtc &&  $qtc->patient_reception)? $qtc->patient_reception : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_return_base">Retorno a base </label>
                                        <input type="time" class="form-control" name="return_base" value="{{ ( $qtc &&  $qtc->return_base)? $qtc->return_base : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_base">Movil en base</label>
                                        <input type="time" class="form-control" name="mobile_base" value="{{ ( $qtc &&  $qtc->mobile_base)? $qtc->mobile_base : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-4">
                                        <label for="for_observation">Observacion </label>
                                        <input type="text" class="form-control" name="observation" value="{{ ( $qtc &&  $qtc->observation)? $qtc->observation : '' }}">
                                    </fieldset>
                                
                    </div>
                    <div class="form-row">
                                <fieldset class="form-group col-md-2">
                                    <label for="for_guardar_hours"></label>
                                    <input hidden name="call_id" value="{{$call->id}}"> 
                                    <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                                </fieldset>
                        </div>
        </form>

<!-- inicio evaluacion de paciente-->
            <hr>
            <form method="post" action="{{ route('samu.qtc.update') }}">
                @csrf
                @method('PUT')

                    <h4>Evaluación de paciente</h4>
                    <div class="form-row">
                        <div class=" col-md-6">
                        <label for="for_reception_detail">Detalle de Recepción </label>                                
                        <textarea class="form-control" style="height: 100px" name="reception_detail">{{ ( $qtc &&  $qtc->reception_detail)? $qtc->reception_detail : '' }}</textarea>
                        </div>
                        <fieldset class="form-group  col-md-3">
                                    <label for="for_establishment">Est. Recepcion de paciente </label>
                                    <select class="form-control" name="establishment" id="establishment">
                                        
                                            <option> </option>
                                            <option value="Hospital Dr Ernesto Torres Galdames" {{ $qtc->establishment === 'Hospital Dr Ernesto Torres Galdames' ? 'selected' : '' }} >Hospital Dr Ernesto Torres Galdames</option>
                                            <option value="SAPU Cirujano Aguirre" {{ $qt->establishment=== 'SAPU Cirujano Aguirre' ? 'selected' : '' }}>SAPU Cirujano Aguirre</option>
                                            <option value="SAPU Cirujano Guzmán" {{ $qtc->establishment === 'SAPU Cirujano Guzmán' ? 'selected' : '' }}>SAPU Cirujano Guzmán</option>
                                            <option value="SAPU Cirujano Videla" {{ $qtc->establishment=== 'SAPU Cirujano Videla' ? 'selected' : '' }}>SAPU Cirujano Videla</option>
                                            <option value="SAPU El Boro" {{ $qtc->establishment=== 'SAPU El Boro' ? 'selected' : '' }}>SAPU El Boro</option>
                                            <option value="SAPU Huara" {{ $qt->establishment=== 'SAPU Huara' ? 'selected' : '' }}>SAPU Huara</option>
                                            <option value="SAPU Pedro Pulgar" {{ $qtc->establishment === 'SAPU Pedro Pulgar' ? 'selected' : '' }}>SAPU Pedro Pulgar</option>
                                            <option value="SAPU Pozo Almonte" {{ $qtc->establishment === 'SAPU Pozo Almonte' ? 'selected' : '' }}>SAPU Pozo Almonte</option>
                                            <option value="SAR La Tortuga" {{ $qtc->establishment === 'SAR La Tortuga' ? 'selected' : '' }}>SAR La Tortuga</option>
                                            <option value="SAR Sur de Iquique" {{ $qtc->establishment === 'SAR Sur de Iquique' ? 'selected' : '' }}>SAR Sur de Iquique</option>
                                            <option value="Servicio Médico Legal Iquique" {{ $qtc->establishment === 'Servicio Médico Legal Iquique' ? 'selected' : '' }}>Servicio Médico Legal Iquique</option>
                                            <option value="SMA Servicios Medicos" {{ $qtc->establishment === 'SMA Servicios Medicos' ? 'selected' : '' }}>SMA Servicios Medicos</option>
                                            <option value="SUR Camiña" {{ $qtc->establishment === 'SUR Camiña' ? 'selected' : '' }}>SUR Camiña</option>
                                            <option value="SUR Cariquima" {{ $qtc->establishment === 'SUR Cariquima' ? 'selected' : '' }}>SUR Cariquima</option>
                                            <option value="SUR Chanavayita" {{ $qtc->establishment === 'SUR Chanavayita' ? 'selected' : '' }}>SUR Chanavayita</option>
                                            <option value="SUR Colchane" {{ $qt->establishment === 'SUR Colchane' ? 'selected' : '' }}>SUR Colchane</option>
                                            <option value="SUR Pica" {{ $qtc->establishment === 'SUR Pica' ? 'selected' : '' }}>SUR Pica</option>
                                            <option value="SUR Tarapacá" {{ $qtc->establishment === 'SUR Tarapacá' ? 'selected' : '' }}>SUR Tarapacá</option>
                                    </select>
                                </fieldset>
                                <fieldset class="form-group  col-md-3">
                                    <label for="for_reception_person">Personal Recepcion del Pcte.</label>
                                    <input type="text" class="form-control" name="reception_person" value="{{ ( $qtc &&  $qtc->reception_person)? $qtc->reception_person : '' }}">
                                </fieldset>
                    
                        
                    </div>
                        <!--fin evaluacion paciente-->
                            <hr>
                            <h4> Asignación Signos Vitales</h4>

                            <div class="form-row">
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_fc">Frecuencia Cardiaca</label>
                                            <input type="number" class="form-control" name="fc" value="{{ ( $qtc &&  $qtc->fc)? $qtc->fc : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_fr">Frecuencia Respiratoria </label>
                                            <input type="number" class="form-control" name="fr" value="{{ ( $qtc &&  $qtc->fr)? $qtc->fr : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_pa">Presión Arterial</label>
                                            <input type="number" class="form-control" name="pa" value="{{ ( $qtc &&  $qtc->pa)? $qtc->pa : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_pam">Presión Arterial Media</label>
                                            <input type="number" class="form-control" name="pam" value="{{ ( $qtc &&  $qtc->pam)? $qtc->pam : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_gl">Glasgow</label>
                                            <input type="number" class="form-control" name="gl" value="{{ ( $qtc &&  $qtc->gl)? $qtc->gl : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_soam">% Saturacion Oxigeno Ambiental</label>
                                            <input type="number" class="form-control" name="soam" value="{{ ( $qtc &&  $qtc->soam)? $qtc->soam : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_soap">% Saturación Oxigeno/Apoyo</label>
                                            <input type="number" class="form-control" name="soap" value="{{ ( $qtc &&  $qtc->soap)? $qtc->soap : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_hgt">HGT mg/dl</label>
                                            <input type="number" class="form-control" name="hgt" value="{{ ( $qtc &&  $qtc->hgt)? $qtc->soap : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_fill_capillary">Llene Capilar</label>
                                            <input type="number" class="form-control" name="fill_capillary" value="{{ ( $qtc &&  $qtc->fill_capillary)? $qtc->fill_capillary : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_t">Temperatura °C</label>
                                            <input type="number" class="form-control" name="t" value="{{ ( $qtc &&  $qtc->t)? $qtc->t : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-4">
                                            <label for="for_treatment">Tratamiento</label>
                                            <input type="text" class="form-control" name="treatment" value="{{ ( $qtc &&  $qtc->treatment)? $qtc->treatment : '' }}">
                                        </fieldset>
                                        <div class=" col-md-12">
                                            <label for="for_observation_sv">Observación </label>
                                            <textarea class="form-control" style="height: 100px" name="observation_sv">{{ ( $qtc &&  $qtc->observation_sv)? $qtc->observation_sv : '' }}</textarea>
                                        </div>                   
                        </div>
                        <div class="form-row mb-3">
                                    <fieldset class="form-group col-md-2 mt-3 ">
                                        <label for="for_guardar"></label>
                                        <input hidden name="call_id" value="{{$call->id}}"> 
                                        <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                                    </fieldset>
                            </div>       

            </form>

            <!-- fin de seguimeinto-->

     </div>
</div>



@endsection
