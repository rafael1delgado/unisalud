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
        <h3 class="text-success"><b> Seguimiento Traslado</b></h3>
            
            <div class="row mb-4">
                <div class="col-12 col-md-3">
                    <form method="GET" class="form-horizontal" action="">
                        <div class="input-group mb-sm-0">
                            <input class="form-control" type="text" name="search" autocomplete="off" id="for_search"
                                style="text-transform: uppercase;"
                                placeholder="QTC" value="" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <hr>
            <h4> Asignación de seguimiento horario</h4>
            <div class="form-row">
                        <fieldset class="form-group  col-md-1">
                            <label for="for_run">Clave</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="text" class="form-control" name="clave" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-1">
                            <label for="for_run">Clave de Retorno</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="text" class="form-control" name="claver" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_movil">Movil</label>
                                <select class="form-control" name="recepcion" id="recepcion">
                                    <option>Seleccione Movil </option>
                                    <option value="1" >Movil 2</option>
                                    <option value="2" >Movil 5</option>
                                    <option value="3" >Movil 12</option>
                                    <option value="4" >Movil 6</option>
                                    <option value="5" >Movil 4</option>
                                    <option value="6" >Movil 11</option>
                                
                                </select>
                        </fieldset>
                        <fieldset class="form-group  col-md-1">
                            <label for="for_run">Tipo de Traslado </label>
                            <select class="form-control" name="recepcion" id="recepcion">
                                    <option>Seleccione </option>
                                    <option value="1" >T1</option>
                                    <option value="2" >T2</option>
                                    <option value="3" >RU1</option>
                                    <option value="3" >RU2</option>
                                    <option value="3" >NM</option>
                                    <option value="4" >Otro</option>
                            </select>
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Hora Salida </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="time" class="form-control" name="hora_salida" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Hora Salida Movil </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="time" class="form-control" name="hora_salida_movil" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Llegada Movil Lugar </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="time" class="form-control" name="hora_llegadamovil" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-1">
                            <label for="for_run">Ruta C.Asistencial </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="time" class="form-control" name="ruta" value="">
                        </fieldset>
        </div>
        
        <div class="form-row">
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Movil en centro asistencial</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="time" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Recepcion de Pcte </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="time" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Retorno a base </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="time" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Movil en base</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="time" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-4">
                            <label for="for_run">Observacion </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="text" class="form-control" name="ruta" value="">
                        </fieldset>
                    
        </div>
        <div class="form-row">
                    <fieldset class="form-group col-md-2">
                        <label for="for_run"></label>
                        <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                    </fieldset>
            </div>
<!-- inicio evaluacion de paciente-->
            <hr>
            <h4>Evaluación de paciente</h4>
            <div class="form-row">
                <div class=" col-md-6">
                <label for="for_run">Detalle de Recepción </label>
                    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="" required></textarea>
                    <div class="invalid-feedback">
                    Ingrese descripción
                    </div>
                </div>
                <fieldset class="form-group  col-md-3">
                            <label for="for_run">Est. Recepcion de paciente </label>
                            <select class="form-control" name="recepcion" id="recepcion">
                                    <option>Seleccione </option>
                                    <option value="1" >Hospital Dr Ernesto Torres Galdames</option>
                                    <option value="113">SAPU Cirujano Aguirre</option>
                                                    <option value="115">SAPU Cirujano Guzmán</option>
                                                    <option value="114">SAPU Cirujano Videla</option>
                                                    <option value="119">SAPU El Boro</option>
                                                    <option value="3281">SAPU Huara</option>
                                                    <option value="117">SAPU Pedro Pulgar</option>
                                                    <option value="116">SAPU Pozo Almonte</option>
                                                    <option value="4009">SAR La Tortuga</option>
                                                    <option value="118">SAR Sur de Iquique</option>
                                                    <option value="4004">SEREMI DE SALUD</option>
                                                    <option value="3836">Servicio Médico Legal Iquique</option>
                                                    <option value="4003">SMA Servicios Medicos</option>
                                                    <option value="3933">SUR Camiña</option>
                                                    <option value="3930">SUR Cariquima</option>
                                                    <option value="3928">SUR Chanavayita</option>
                                                    <option value="3929">SUR Colchane</option>
                                                    <option value="3932">SUR Pica</option>
                                                    <option value="3931">SUR Tarapacá</option>
                            </select>
                        </fieldset>
                        <fieldset class="form-group  col-md-3">
                            <label for="for_run">Personal Recepcion del Pcte.</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="time" class="form-control" name="hora_salida" value="">
                        </fieldset>
            
                
            </div>
            <div class="form-row">
                    <fieldset class="form-group col-md-2 mt-3">
                        <label for="for_run"></label>
                        <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
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
                             <textarea class="form-control is-invalid" id="validationTextarea" placeholder="" required></textarea>
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



            <!-- fin de seguimeinto-->

     </div>
</div>



@endsection