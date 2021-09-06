@extends('layouts.app')

@section('content')
@include('nav')

<h3 class="mb-3"><i class="fas fa-phone-volume"></i> Centro de Llamadas</h3>
<!--inicio-->

<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">
   
        <div class="form-row">
                <fieldset class="form-group  col-md-2">
                    <label for="for_run"><b>Fecha de registro</b> </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="date" class="form-control" name="date" value="">
                </fieldset>
                <fieldset class="form-group  col-md-9">
                </fieldset>
                <fieldset class="form-group  col-md-1">
                    <label for="for_run"><i class="fas fa-clock"></i><b> Hora Actual</b> </label>
                    <input type="hidden" class="form-control"  name="hora" value="18:23">
                    <input type="text" class="form-control" name="hora" value="18:23">
                </fieldset>
        </div>  
            <hr>
            
            <div class="form-row">
                <div class="col-12 col-md-4 mb-3">
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalmoviles">
                        <i class="fas fa-plus"></i> Agregar Moviles en turno
                    </a>
                </div>
            </div>
                <!--inicio modal operador-->
            <div class="modal fade" id="modalmoviles" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Moviles en turno</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                            <div class="form-row">
                                    <fieldset class="form-group col-12 col-md-4">
                                    <label for="empresa">Tipo</label>
                                    <select class="form-control" name="mobile" id="mobile">
                                        <option>Seleccione Tipo</option>
                                                    <option value="1" >Movil 1</option>
                                                    <option value="2" >Movil  2</option>
                                                    <option value="3" >Movil  3</option>
                                                    <option value="4" >Movil  4</option>
                                                    <option value="5" >Movil  5</option>
                                                    <option value="3" >Movil  6</option>
                                                    <option value="4" >Movil  7</option>
                                                    <option value="5" >Movil  8</option>
                                                    <option value="1" >Movil 9</option>
                                                    <option value="2" >Movil  10</option>
                                                    <option value="3" >Movil  11</option>
                                                    <option value="4" >Movil  12</option>
                                                    <option value="5" >Movil  13</option>
                                                    <option value="3" >Movil  14</option>
                                                    <option value="4" >Movil  15</option>
                                                    <option value="5" >Movil  16</option>
                                                </select>
                                    </fieldset>

                                    <fieldset class="form-group  col-md-4">
                                        <label for="for_run">Numero de Amb. </label>
                                        <input type="hidden" class="form-control" id="for_id" name="id" value="">
                                        <input type="text" class="form-control" name="date" value="12345">
                                    </fieldset>
                                    <fieldset class="form-group  col-md-4">
                                        <label for="for_run">Estado </label>
                                        <select class="form-control" name="region_id" id="regiones">
                                                    <option>Seleccione Estado</option>
                                                    <option value="1" >Activo</option>
                                                    <option value="2" >Inactivo</option>
                                        </select>
                                        
                                    </fieldset>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary">Guardar</button>
                    </div>
                    </div>
                </div>
                </div>
                <!-- fin modal operador-->
            <div>
                
     </div>

            <div class="form-row">
                <div class="table-responsive col-md-4">
                    <table class="table table-sm table-bordered table-striped small">
                            <thead>
                                <tr class="text-center table-success">
                                    <th>Número</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th>Detalle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2</td>
                                    <td>Movil 2</td>
                                    <td>Activo</td>
                                    <td></td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Movil 5</td>
                                    <td>Activo</td>
                                    <td></td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Movil 12</td>
                                    <td>Activo</td>
                                    <td></td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>44</td>
                                    <td>Movil 6</td>
                                    <td>Activo</td>
                                    <td></td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Movil 4 </td>
                                    <td>Activo</td>
                                    <td></td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Movil 11</td>
                                    <td>Inactivo</td>
                                    <td>Movil con falla de correa</td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                            </tbody>
                        </table>
                </div>

                <div class="table-responsive col-md-8">
                    <table class="table table-sm table-bordered table-striped small">
                        <thead>
                        
                        <tr class="text-center table-info">
                              
                              
                              <th colspan="7"><b>DETALLES DE SALIDAS VEHICULARES</b></th>
                              
                          </tr>
                        
                            <tr class="text-center table-success">
                              
                                <th>Tipo Movil</th>
                                <th>Hora de salida</th>
                                <th>Hora de llegada</th>
                                <th>Detalle de Salida</th>
                                <th>Ubicacion Actual</th>
                                <th>Tripulacion actual</th>
                                <th>QTC</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Movil 5</td>
                                <td>10:00</td>
                                <td>15:12</td>
                                <td>Accidente Vehicular</td>
                                <td><a href="#">Ubicación</a> </td>
                                <td class="text-center" >
                               
                                    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        TRIPULACIÓN
                                        Conductor: Mirta Perez
                                        Paramedico:Juan Revollo
                                        Reanimador: Sofia Valencia
                                        Medico: Najhely Cabrera">
                                                        Ver Tripulación</button>
                                </td>
                                <td>233</td>
                            </tr>


                            <tr>
                                <td>Movil 2</td>
                                <td>16:02</td>
                                <td>Sin retorno</td>
                                <td> Triple colisión vehicular</td>
                                <td><a href="#">Ubicación</a> </td>
                                <td class="text-center" >
                               
                                    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        TRIPULACIÓN
                                        Conductor: Mario Cortez
                                        Paramedico:Sofia Valencia
                                        Reanimador: Najhely Cabrera
                                        Medico: Marta Sanchez">
                                                        Ver Tripulación</button>
                                </td>
                                <td>5522</td>
                            </tr>

                            <tr>
                                <td>Movil 4</td>
                                <td>20:30</td>
                                <td>10:15</td>
                                <td>Traslado de paciente SAR SUR a HETG</td>
                                <td><a href="#">Ubicación</a> </td>
                                <td class="text-center" >
                               
                                    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        TRIPULACIÓN
                                        Conductor: Mario Cortez
                                        Paramedico:Sofia Valencia
                                        Reanimador: Carlos Fuentes
                                        Medico: Marta Sanchez">
                                                        Ver Tripulación</button>
                                </td>
                                <td>6223</td>
                            </tr>
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <!-- registro de llamadas-->
            <h3> Datos de la llamada</h3>
           <div class="form-row">
                <fieldset class="form-group  col-md-1">
                    <label for="for_run">Hora</label>
                    <input type="hidden" class="form-control"  name="hora" value="">
                    <input type="time" class="form-control" name="time_call" value="10:30">
                </fieldset>
                <fieldset class="form-group  col-md-2">
                    <label for="for_run">Recepcion de llamada</label>
                        <select class="form-control" name="recepcion" id="recepcion">
                            <option>Operador 1 </option>
                            <option value="1" >Operador 1</option>
                            <option value="2" >Operador 2</option>
                            <option value="3" >Operador 3</option>
                            <option value="4" >Operador 4</option>
                            <option value="5" >Operador 5</option>
                            <option value="6" >Operador 6</option>
                            <option value="7" >Jefe de turno</option>
                            <option value="8" >Medico Regulador</option>
                            <option value="9" >Enfermera Reguladora</option>
                        </select>
                </fieldset>
                <fieldset class="form-group  col-md-2">
                    <label for="for_run">Motivo de solicitud </label>
                    <input type="hidden" class="form-control"  name="hora" value="">
                    <input type="text" class="form-control" name="hora" value="">
                </fieldset>
                <fieldset class="form-group  col-md-2">
                    <label for="for_run">Solicitante </label>
                    <input type="hidden" class="form-control"  name="hora" value="">
                    <input type="text" class="form-control" name="hora" value="">
                </fieldset>
                <fieldset class="form-group  col-md-2">
                    <label for="for_run">Dirección </label>
                    <input type="hidden" class="form-control"  name="hora" value="">
                    <input type="text" class="form-control" name="hora" value="">
                </fieldset>
                <fieldset class="form-group  col-md-2">
                    <label for="for_run">Teléfono </label>
                    <input type="hidden" class="form-control"  name="hora" value="">
                    <input type="text" class="form-control" name="hora" value="">
                </fieldset>
                <fieldset class="form-group col-md-1">
                    <label for="for_run"><br /> <br /><br /></label>
                    <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                </fieldset>
           </div>

            <hr>
            
            <div class="row mb-4">
                <div class="col-md-3">
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
            

                <hr>
            </div>
            <div class="table-responsive col-md-12">
                    <table class="table table-sm table-bordered table-striped small">
                        <thead>
                        
                        <tr class="text-center table-info">
                              
                              
                              <th colspan="8"><b>Registro de llamadas</b></th>
                              
                          </tr>
                        
                            <tr class="text-center table-success">
                              
                                <th>QTC</th>
                                <th>Hora</th>
                                <th>Recepcion de llamada</th>
                                <th>Información telefonica</th>
                                <th>Solicitante</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class=" bg-danger">1111</td>
                                <td>08:10</td>
                                <td>operador 2</td>
                                <td>DRA GOMEZ DR MENDEZ 6 TP TODO OPERATIVO </td>
                                <td>Daniel Guerrero</td>
                                <td>Av. salvador allende 222</td>
                                <td> +56945522328</td>
                                <th class=" bg-secondary text-center"> <a class="text-white " href="{{ route('samu.call.edit') }}"><b>Seguimiento</b></a></th>
                            </tr>
                            <!--ot-->
                            <tr>
                                <td >1101</td>
                                <td>08:10</td>
                                <td>operador 2</td>
                                <td>DRA GOMEZ DR MENDEZ  </td>
                                <td>Daniel Guerrero</td>
                                <td>Av. salvador allende 222</td>
                                <td> +56945522328</td>
                                <th class=" bg-primary text-center"> <a class="text-white " href="{{ route('samu.call.otedit') }}"><b>Seguimiento</b></a></th>
                            </tr>
                               <!--fin ot-->
                            <tr>
                                <td class=" bg-danger">2222</td>
                                <td>09:10</td>
                                <td>operador 1, operador 4</td>
                                <td>22 AÑOS  CON SOSPECHA DE AGRESION </td>
                                <td>Sofia Perez</td>
                                <td>Calle amunategui 155</td>
                                <td> +569002328</td>
                                <th class=" bg-secondary text-center"> <a class="text-white " href="{{ route('samu.call.edit') }}"><b>Seguimiento</b></a></th>
                            </tr>
                            <tr>
                                <td>233</td>
                                <td>10:00</td>
                                <td>operador 3</td>
                                <td> Accidente Vehicular</td>
                                <td>Amanda Castro</td>
                                <td>Pedro prado 1000</td>
                                <td>+56978788555</td>
                                <th class=" bg-warning text-center"> <a class="text-white " href="{{ route('samu.call.edit') }}"><b>Seguimiento</b></a></th>
                            </tr>
                            <!-- traslado-->
                            <tr>
                                <td>3000</td>
                                <td>12:45</td>
                                <td>operador 1</td>
                                <td> FEMENINA 61 AÑOS DM TIPO II,  CAIDA </td>
                                <td>mirtha Lopez</td>
                                <td>Calle 2 S/N</td>
                                <td>+56325255663</td>
                                <th class=" bg-success text-center"> <a class="text-white " href="{{ route('samu.call.tedit') }}"><b>Seguimiento</b></a></th>
                            </tr>
                            <!-- fin traslado-->
                            <tr>
                                <td>4000</td>
                                <td>14:03</td>
                                <td>Medico regulador</td>
                                <td>Reportan a niño de 6 años con posible ACV </td>
                                <td>Camilo zeballos</td>
                                <td>Calle soto mayor 255</td>
                                <td> +5663636265</td>
                                <th class=" bg-warning text-center"> <a class="text-white " href="{{ route('samu.call.edit') }}"><b>Seguimiento</b></a></th>
                            </tr>
                            <!--traslado-->
                            <tr>
                                <td class="bg-danger">5000</td>
                                <td>15:23</td>
                                <td>operador 2</td>
                                <td>FEMENINA DE 23 AÑOS POSIBLE DESCOMPENSACION</td>
                                <td>Jose Armando Aguilar</td>
                                <td>Calle Algarrobo 200</td>
                                <td>+56922252556</td>
                                <th class=" bg-success text-center"> <a class="text-white " href="{{ route('samu.call.tedit') }}"><b>Seguimiento</b></a></th>
                            </tr>
                            <!-- fin trasalado-->
                            <tr>
                                <td class=" bg-danger">5522</td>
                                <td>16:02</td>
                                <td>Medico Regukador</td>
                                <td>Triple colisión vehicular</td>
                                <td>Daniela Molina</td>
                                <td>Autopísta Humberstone</td>
                                <td>+56920000114</td>
                                <th class=" bg-secondary text-center"> <a class="text-white " href="{{ route('samu.call.edit') }}"><b>Seguimiento</b></a></th>
                            </tr>
                            <tr>
                                <td>6223</td>
                                <td>20:30</td>
                                <td>Operador 4</td>
                                <td>Traslado de paciente SAR SUR a HETG</td>
                                <td>Dr. Alex Orozco</td>
                                <td>Barros Arana 5333</td>
                                <td>+56923366363</td>
                                <th class=" bg-warning text-center"> <a class="text-white " href="{{ route('samu.call.edit') }}"><b>Seguimiento</b></a></th>
                            </tr>    
                        </tbody>
                    </table>

                </div>
                <!-- fin de registro de llamadas-->
        
          <!--estado de las personas en turno
                novedades
                ambulancias por turno
                centro regulador por turno-->

    </div>
</div>



@endsection

@section('custom_js')
<script>
$(function () {
        $('[data-toggle="popover" ]').popover()
    })
</script>
@endsection

