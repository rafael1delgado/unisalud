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
                    <input type="date" class="form-control" name="date" value="">
                </fieldset>
                <fieldset class="form-group  col-md-9">
                </fieldset>
                <fieldset class="form-group  col-md-1">
                    <label for="for_run"><i class="fas fa-clock"></i><b> Hora Actual</b> </label>
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
                                    <th>Detalle</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2</td>
                                    <td>Movil 2</td>
                                    <td></td>
                                    <td><a href="#">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Movil 5</td>
                                    <td></td>
                                    <td><a href="#">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Movil 12</td>
                                    <td></td>
                                    <td><a href="#">Editar</a> </td>
                                </tr>
                                <tr class="bg-danger text-white">
                                    <td>44</td>
                                    <td>Movil 6</td>
                                    <td></td>
                                    <td><a href="#">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Movil 4 </td>
                                    <td></td>
                                    <td><a href="#">Editar</a> </td>
                                </tr>
                                <tr class="bg-danger text-white">
                                    <td>5</td>
                                    <td>Movil 11</td>
                                    <td>Movil con falla de correa</td>
                                    <td><a href="#">Editar</a> </td>
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
            <form method="POST" action="{{ route('samu.qtc.store') }}">
                @csrf
                @method('POST')
                <div class="form-row">
                        <fieldset class="form-group  col-md-2">
                            <label for="for_hour">Clase</label>
                            <select class="form-control" name="class_qtc" id="class_qtc">
                                    <option>Seleccionar </option>
                                    <option value="emergencia" >Emergencia</option>
                                    <option value="ot" >OT</option>
                                    <option value="traslado" >Traslado</option>
                                </select>
                        </fieldset>
                        <fieldset class="form-group  col-md-1">
                            <label for="for_hour">Hora</label>
                            <input type="time" class="form-control" name="hour" id="hour">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_call_reception">Recep. de llamada</label>
                                <select class="form-control" name="call_reception" id="call_reception">
                                    <option>Operador 1 </option>
                                    <option value="Operador 1" >Operador 1</option>
                                    <option value="Operador 2" >Operador 2</option>
                                    <option value="Operador 3" >Operador 3</option>
                                    <option value="Operador 4" >Operador 4</option>
                                    <option value="Operador 5" >Operador 5</option>
                                    <option value="Operador 6" >Operador 6</option>
                                    <option value="Jefe de turno" >Jefe de turno</option>
                                    <option value="Medico Regulador" >Medico Regulador</option>
                                    <option value="Enfermera Reguladora" >Enfermera Reguladora</option>
                                </select>
                        </fieldset>
                        <fieldset class="form-group  col-md-3">
                            <label for="for_telephone_information">Motivo de solicitud </label>
                            <input type="text" class="form-control"  name="telephone_information">
                        
                        </fieldset>
                        <fieldset class="form-group  col-md-1">
                            <label for="for_applicant">Solicitante </label>
                            <input type="text" class="form-control" name="applicant">
                        </fieldset>
                        <fieldset class="form-group  col-md-1">
                            <label for="for_direction">Dirección </label>
                            <input type="text" class="form-control" name="direction">
                        </fieldset>
                        <fieldset class="form-group  col-md-1">
                            <label for="for_telephone">Teléfono </label>
                            <input type="text" class="form-control" name="telephone">
                        </fieldset>
                        <fieldset class="form-group col-md-1">
                            <label for="for_guardar_qtc"><br /> <br /><br /></label>
                            <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                        </fieldset>
                </div>

            <hr>
            
           
            <hr>
            <div class="table-responsive col-md-12">
                    <table class="table table-sm table-bordered table-striped small">
                        <thead>
                        
                        <tr class="text-center table-info">
                              
                              
                              <th colspan="9"><b>Registro de llamadas</b></th>
                              
                          </tr>
                        
                            <tr class="text-center table-success">
                              
                                <th>QTC</th>
                                <th>Clase</th>
                                <th>Hora</th>
                                <th>Recepcion de llamada</th>
                                <th>Información telefonica</th>
                                <th>Solicitante</th>
                                <th>Dirección</th>
                                <th>Teléfono</th>
                                <th>Seguimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($qtcs as $qtc)
                            <tr>
                                <td>{{ $qtc->id}}</td>
                                <td>{{ $qtc->class_qtc }}</td>
                                <td>{{ $qtc->hour}}</td>
                                <td>{{ $qtc->call_reception}}</td>
                                <td>{{ $qtc->telephone_information }}</td>
                                <td>{{ $qtc->applicant }}</td>
                                <td>{{ $qtc->direction }}</td>
                                <td>{{ $qtc->telephone }}</td>
                                
                                <td><a href="{{ route('samu.qtc.edit', $qtc) }}">Seguimiento</a> </td>
                               

                            </tr>
                         @endforeach   
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

