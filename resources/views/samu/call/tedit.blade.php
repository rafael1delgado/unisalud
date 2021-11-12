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
        <h3 class="text-success"><b> Seguimiento Traslado</b></h3>
            
            <hr>
            <h4> Asignación de seguimiento horario</h4>
            <form method="post" action="{{ route('samu.qtc.tstore') }}">
                @csrf
                @method('POST')
                        <div class="form-row">
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_key">Clave</label>
                                        <select class="form-control" name="key">
                                        <option value=""></option>
                                        @foreach($keys as $key)
                                            <option value="{{ $call->qtc->key === '$key' ? 'selected' : '' }}">{{$key->name_key_code}} </option>
                                        
                                        @endforeach  
                                        </select>
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_return">Clave de Retorno</label>
                                        <select class="form-control" name="key">
                                        <option value=""></option>
                                        @foreach($keys as $key)
                                            
                                            <option value="{{ $call->qtc->key_return === '$key' ? 'selected' : '' }}">{{$key->name_key_code}} </option>
                                        
                                        @endforeach  
                                        </select>
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                    @if($shift)
                                        <label for="for_mobile">Movil</label>
                                            <select class="form-control" name="mobile" id="mobile">
                                                <option value=""> </option>
                                                <option value="Movil 2" >Movil 2</option>
                                                <option value="Movil 5" >Movil 5</option>
                                                <option value="Movil 12" >Movil 12</option>
                                                <option value="Movil 6" >Movil 6</option>
                                                <option value="Movil 4" >Movil 4</option>
                                                <option value="Movil 11" >Movil 11</option>
                                            
                                            </select>
                                        @endif
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_transfer_type">Tipo de Traslado </label>
                                        <select class="form-control" name="transfer_type" id="transfer_type">
                                                <option value=""></option>
                                                <option value="T1" {{ $call->qtc->transfer_type === 'T1' ? 'selected' : '' }} >T1</option>
                                                <option value="T2" {{ $call->qtc->transfer_type === 'T2' ? 'selected' : '' }}  >T2</option>
                                                <option value="RU1"{{ $call->qtc->transfer_type === 'RU1' ? 'selected' : '' }} >RU1</option>
                                                <option value="RU2" {{ $call->qtc->transfer_type === 'RU2' ? 'selected' : '' }}  >RU2</option>
                                                <option value="NM"{{ $call->qtc->transfer_type === 'NM' ? 'selected' : '' }} >NM</option>
                                                <option value="Otro"{{ $call->qtc->transfer_type === 'Otro' ? 'selected' : '' }} >Otro</option>
                                        </select>
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_departure_time">Hora Salida </label>
                                        <input type="time" class="form-control" name="departure_time" value="{{ ( $call->qtc &&  $call->qtc->departure_time)? $call->qtc->departure_time : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_departure_time">Hora Salida Movil </label>
                                        <input type="time" class="form-control" name="mobile_departure_time" value="{{ ( $call->qtc &&  $call->qtc->mobile_departure_time)? $call->qtc->mobile_departure_time : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_arrival_place">Llegada Movil Lugar </label>
                                        <input type="time" class="form-control" name="mobile_arrival_place" value="{{ ( $call->qtc &&  $call->qtc->mobile_arrival_place)? $call->qtc->mobile_arrival_place : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_route_ca">Ruta C.Asistencial </label>
                                        <input type="time" class="form-control" name="route_ca" value="{{ ( $call->qtc &&  $call->qtc->route_ca)? $call->qtc->route_ca : '' }}">
                                    </fieldset>
                    </div>
                    
                    <div class="form-row">
                           
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_ca">Movil en centro asistencial</label>
                                        <input type="time" class="form-control" name="mobile_ca" value="{{ ( $call->qtc &&  $call->qtc->mobile_ca)? $call->qtc->mobile_ca : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_patient_reception">Recepcion de Pcte </label>
                                        <input type="time" class="form-control" name="patient_reception" value="{{ ( $call->qtc &&  $call->qtc->patient_reception)? $call->qtc->patient_reception : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_return_base">Retorno a base </label>
                                        <input type="time" class="form-control" name="return_base" value="{{ ( $call->qtc &&  $call->qtc->return_base)? $call->qtc->return_base : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-2">
                                        <label for="for_mobile_base">Movil en base</label>
                                        <input type="time" class="form-control" name="mobile_base" value="{{ ( $call->qtc &&  $call->qtc->mobile_base)? $call->qtc->mobile_base : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-4">
                                        <label for="for_observation">Observacion </label>
                                        <input type="text" class="form-control" name="observation" value="{{ ( $call->qtc &&  $call->qtc->observation)? $call->qtc->observation : '' }}">
                                    </fieldset>
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
            <form method="post" action="{{ route('samu.qtc.tupdate', $call->qtc) }}">
                @csrf
                @method('PUT')

                    <h4>Evaluación de paciente</h4>
                    <div class="form-row">
                        <div class=" col-md-6">
                        <label for="for_reception_detail">Detalle de Recepción </label>                                
                        <textarea class="form-control" style="height: 100px" name="reception_detail">{{ ( $call->qtc &&  $call->qtc->reception_detail)? $call->qtc->reception_detail : '' }}</textarea>
                        </div>
                        <fieldset class="form-group  col-md-3">
                                    <label for="for_establishment">Est. Recepcion de paciente </label>
                                    <select class="form-control" name="establishment" id="establishment">
                                        
                                            <option value=""></option>
                                            <option value="Hospital Dr Ernesto Torres Galdames" {{ $call->qtc->establishment === 'Hospital Dr Ernesto Torres Galdames' ? 'selected' : '' }} >Hospital Dr Ernesto Torres Galdames</option>
                                            <option value="SAPU Cirujano Aguirre" {{ $call->qtc->establishment === 'SAPU Cirujano Aguirre' ? 'selected' : '' }}>SAPU Cirujano Aguirre</option>
                                            <option value="SAPU Cirujano Guzmán" {{ $call->qtc->establishment === 'SAPU Cirujano Guzmán' ? 'selected' : '' }}>SAPU Cirujano Guzmán</option>
                                            <option value="SAPU Cirujano Videla" {{ $call->qtc->establishment === 'SAPU Cirujano Videla' ? 'selected' : '' }}>SAPU Cirujano Videla</option>
                                            <option value="SAPU El Boro" {{ $call->qtc->establishment === 'SAPU El Boro' ? 'selected' : '' }}>SAPU El Boro</option>
                                            <option value="SAPU Huara" {{ $call->qtc->establishment === 'SAPU Huara' ? 'selected' : '' }}>SAPU Huara</option>
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
                                <fieldset class="form-group  col-md-3">
                                    <label for="for_reception_person">Personal Recepcion del Pcte.</label>
                                    <input type="text" class="form-control" name="reception_person" value="{{ ( $call->qtc &&  $call->qtc->reception_person)? $call->qtc->reception_person : '' }}">
                                </fieldset>
                    
                        
                    </div>
                        <!--fin evaluacion paciente-->
                            <hr>
                            <h4> Asignación Signos Vitales</h4>

                            <div class="form-row">
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_fc">Frecuencia Cardiaca</label>
                                            <input type="number" class="form-control" name="fc" value="{{ ( $call->qtc &&  $call->qtc->fc)? $call->qtc->fc : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_fr">Frecuencia Respiratoria </label>
                                            <input type="number" class="form-control" name="fr" value="{{ ( $call->qtc &&  $call->qtc->fr)? $call->qtc->fr : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_pa">Presión Arterial</label>
                                            <input type="number" class="form-control" name="pa" value="{{ ( $call->qtc &&  $call->qtc->pa)? $call->qtc->pa : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_pam">Presión Arterial Media</label>
                                            <input type="number" class="form-control" name="pam" value="{{ ( $call->qtc &&  $call->qtc->pam)? $call->qtc->pam : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_gl">Glasgow</label>
                                            <input type="number" class="form-control" name="gl" value="{{ ( $call->qtc &&  $call->qtc->gl)? $call->qtc->gl : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_soam">% Saturacion Oxigeno Ambiental</label>
                                            <input type="number" class="form-control" name="soam" value="{{ ( $call->qtc &&  $call->qtc->soam)? $call->qtc->soam : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_soap">% Saturación Oxigeno/Apoyo</label>
                                            <input type="number" class="form-control" name="soap" value="{{ ( $call->qtc &&  $call->qtc->soap)? $call->qtc->soap : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_hgt">HGT mg/dl</label>
                                            <input type="number" class="form-control" name="hgt" value="{{ ( $call->qtc &&  $call->qtc->hgt)? $call->qtc->soap : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_fill_capillary">Llene Capilar</label>
                                            <input type="number" class="form-control" name="fill_capillary" value="{{ ( $call->qtc->follow &&  $call->qtc->fill_capillary)? $call->qtc->fill_capillary : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-2">
                                            <label for="for_t">Temperatura °C</label>
                                            <input type="number" class="form-control" name="t" value="{{ ( $call->qtc &&  $call->qtc->t)? $call->qtc->t : '' }}">
                                        </fieldset>
                                        <fieldset class="form-group  col-md-4">
                                            <label for="for_treatment">Tratamiento</label>
                                            <input type="text" class="form-control" name="treatment" value="{{ ( $call->qtc &&  $call->qtc->treatment)? $call->qtc->treatment : '' }}">
                                        </fieldset>
                                        <div class=" col-md-12">
                                            <label for="for_observation_sv">Observación </label>
                                            <textarea class="form-control" style="height: 100px" name="observation_sv">{{ ( $call->qtc &&  $call->qtc->observation_sv)? $call->qtc->observation_sv : '' }}</textarea>
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