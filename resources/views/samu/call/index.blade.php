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
            <hr>
            <!-- registro de llamadas-->
            <h3> Datos de la llamada</h3>
            
            <form method="POST" action="{{ route('samu.call.store') }}">
                @csrf
                @method('POST')
                <div class="form-row">
                        <fieldset class="form-group  col-md-2">
                            <label for="for_hour">Clase</label>
                            <select class="form-control" name="class_call" id="class_call">
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
                            <label for="for_guardar_call"><br /> <br /><br /></label>
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
                        @foreach($calls as $call)
                            <tr>
                                <td>{{ $call->id}}</td>
                                <td>{{ $call->class_call }}</td>
                                <td>{{ $call->hour}}</td>
                                <td>{{ $call->call_reception}}</td>
                                <td>{{ $call->telephone_information }}</td>
                                <td>{{ $call->applicant }}</td>
                                <td>{{ $call->direction }}</td>
                                <td>{{ $call->telephone }}</td>
                                
                              
                                <td class="text-center"><a href="{{ route('samu.call.edit',[$call, $shift]) }}"><button type="button" class="btn btn-warning"><i class="fas fa-edit"></i></button</a> </td>
                         

                                <td class="text-center" >
                                <form method="POST" action="{{ route('samu.call.destroy' , $call) }}">
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

