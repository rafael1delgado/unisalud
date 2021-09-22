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
                                        <input type="text" class="form-control" name="key" value="{{ ( $qtc->follow &&  $qtc->follow->key)? $qtc->follow->key : '' }}">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_return">Clave de Retorno</label>
                                        <input type="text" class="form-control" name="key_return" value="{{ ( $qtc->follow &&  $qtc->follow->key_return)? $qtc->follow->key_return : '' }}">
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
                                        <input type="time" class="form-control" name="mobile_arrival_place" value="{{ ( $qtc->follow &&  $qtc->follow->mobile_arrival_place)? $qtc->follow->mobile_arrival_place : '' }}">>
                                    </fieldset>
                                    <fieldset class="form-group  col-md-1">
                                        <label for="for_route_ca">Ruta C.Asistencial </label>
                                        <input type="time" class="form-control" name="route_ca" value="{{ ( $qtc->follow &&  $qtc->follow->route_ca)? $qtc->follow->route_ca : '' }}">>
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
            <form method="post" action="{{ route('samu.follow.store') }}">
                @csrf
                @method('POST')

                    <h4>Evaluación de paciente</h4>
                    <div class="form-row">
                        <div class=" col-md-6">
                        <label for="for_reception_detail">Detalle de Recepción </label>
                            <textarea class="form-control" id="reception_detail" name="reception_detail" placeholder="" required value="{{ ( $qtc->follow &&  $qtc->follow->reception_detail)? $qtc->follow->reception_detail : '' }}">></textarea>
                            <div class="invalid-feedback">
                            Ingrese descripción
                            </div>
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
                                    <label for="for_run">Personal Recepcion del Pcte.</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="time" class="form-control" name="hora_salida" value="">
                                </fieldset>
                    
                        
                    </div>
                <!--fin evaluacion paciente-->
                    <hr>
                    <h4> Asignación Signos Vitales</h4>

                    <div class="form-row">
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">Frecuencia Cardiaca</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">Frecuencia Respiratoria </label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">Presión Arterial</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">Presión Arterial Media</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">Glasgow</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">% Saturacion Oxigeno Ambiental</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">% Saturación Oxigeno/Apoyo</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">HGT mg/dl</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">Llene Capilar</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-2">
                                    <label for="for_run">Temperatura °C</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="number" class="form-control" name="ruta" value="">
                                </fieldset>
                                <fieldset class="form-group  col-md-4">
                                    <label for="for_run">Tratamiento</label>
                                    <input type="hidden" class="form-control"  name="hora" value="">
                                    <input type="text" class="form-control" name="ruta" value="">
                                </fieldset>
                                <div class=" col-md-12">
                                    <label for="for_run">Observación </label>
                                    <textarea class="form-control
                                    " id="validationTextarea" placeholder="" required></textarea>
                                    <div class="invalid-feedback">
                                        Ingrese observación
                                    </div>
                                </div>
                                
                            
                </div>
                <div class="form-row mb-3">
                            <fieldset class="form-group col-md-2 mt-3 ">
                                <label for="for_run"></label>
                                <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                            </fieldset>
                    </div>       

            </form>

            <!-- fin de seguimeinto-->

     </div>
</div>



@endsection