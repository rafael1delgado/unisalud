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
        <h3> Seguimiento</h3>
            
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

            <hr>
            <h4> Asignación Signos Vitales</h4>

            <div class="form-row">
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Frecuencia Cardiaca</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="text" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Frecuencia Respiratoria </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="text" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">P/A</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="text" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">P/AM</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="text" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Glasgow </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="int" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">% Saturacion Oxigeno </label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="int" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">% Saturacion Oxigeno/Apoyo</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="int" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">HGT mg/dl/label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="int" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_run">Temperatura °C</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="int" class="form-control" name="ruta" value="">
                        </fieldset>
                        <fieldset class="form-group  col-md-6">
                            <label for="for_run">Tratamiento</label>
                            <input type="hidden" class="form-control"  name="hora" value="">
                            <input type="int" class="form-control" name="ruta" value="">
                        </fieldset>
                        
                    
        </div>
        <div class="form-row">
                    <fieldset class="form-group col-md-2">
                        <label for="for_run"></label>
                        <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                    </fieldset>
            </div>       
        <h3 class="mb-3"><i class="fas fa-clipboard-list"></i> Agregar centro regulador</h3>

        <div class="row mb-4">
            <div class="col-12 col-md-2">
                <a class="btn btn-success" href="{{ route('samu.regulatory-center.create') }}">
                    <i class="fas fa-plus"></i> Agregar
                </a>
            </div>
        </div>



            <!-- fin de seguimeinto-->

     </div>
</div>



@endsection