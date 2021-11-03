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
                <fieldset class="form-group  col-md-10">
                    <label for="for_run"><h4><i class="far fa-calendar-alt"></i> Fecha de registro: {{date('Y-m-d')}}</h4> </label>    
                </fieldset>
        </div>  
            <div class="form-row">
                <div class="col-12 col-md-4 mb-3">
                    <a class="btn btn-success" data-bs-toggle="modal" data-bs-target="#modalmoviles">
                        <i class="fas fa-plus"></i> Agregar Moviles en turno
                    </a>
                </div>
            </div>
<!--aca va lo eliminado-->

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
                                    <option value="T1" >T1</option>
                                    <option value="T2" >T2</option>
                                    <option value="NM" >NM</option>
                                    <option value="OT" >OT</option>
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
            </form>
           
            <hr>
            <div class="table-responsive col-md-12">
                    <table class="table table-sm table-bordered table-striped small">
                        <thead>
                        
                        <tr class="text-center table-info">
                              
                              
                              <th colspan="10"><b>Registro de llamadas</b></th>
                              
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
                                <th>Eliminar</th>
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
                                
                                <td class="text-center"><a href="{{ route('samu.qtc.edit', $qtc) }}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button</a> </td>
                                <td class="text-center" >
                                <form method="POST" action="{{ route('samu.qtc.destroy' , $qtc) }}">
                                @csrf
                                @method('DELETE')
                                <button type="button" class="btn btn-danger"> <i class="fas fa-trash-alt fa-lg"></i> </button>
                                </td>
                            </form>
                               

                            </tr>
                         @endforeach   
                        </tbody>
                    </table>

                </div>
                <!-- fin de registro de llamadas-->
        
    </div>
</div>



@endsection

@section('custom_js')
<!--para que los popover solo duren 3 segundos-->
<script>
$(function () {
        $('[data-toggle="popover" ]').popover()
    })
</script>
@endsection

