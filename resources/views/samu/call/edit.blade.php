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

    <h3> Datos de la llamada</h3>
            
             <form method="POST" action="{{ route('samu.call.update', $call) }}">
                @csrf
                @method('PUT')
                <div class="form-row">

                        <fieldset class="form-group  col-md-3">
                            <label for="for_hour">Clase</label>
                            <select class="form-control" name="class_call" id="class_call">
                                    <option> {{ $call->class_call }} </option>
                                    <option value="T1" >T1</option>
                                    <option value="T2" >T2</option>
                                    <option value="NM" >NM</option>
                                    <option value="OT" >OT</option>
                                </select>
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_hour">Hora</label>
                            <input type="time" class="form-control" name="hour" id="hour"  value="{{$call->hour}}">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_call_reception">Recep. de llamada</label>
                                <select class="form-control" name="call_reception" id="call_reception">
                                    <option >{{ $call->call_reception }}</option>
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
                        <fieldset class="form-group  col-md-5">
                            <label for="for_telephone_information">Motivo de solicitud </label>
                            <input type="text" class="form-control"  name="telephone_information" value="{{ $call->telephone_information }}">
                        
                        </fieldset>
                </div>
                 <div class="form-row">
                        <fieldset class="form-group  col-md-4">
                            <label for="for_applicant">Solicitante </label>
                            <input type="text" class="form-control" name="applicant" value="{{ $call->applicant }}">
                        </fieldset>
                        <fieldset class="form-group  col-md-4">
                            <label for="for_direction">Dirección </label>
                            <input type="text" class="form-control" name="direction" value="{{ $call->direction }}">
                        </fieldset>
                        <fieldset class="form-group  col-md-2">
                            <label for="for_telephone">Teléfono </label>
                            <input type="text" class="form-control" name="telephone" value="{{ $call->telephone }}" >
                        </fieldset>
                        <fieldset class="form-group col-md-2">
                            <label for="for_update_call"><br /> <br /><br /></label>
                            <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
                        </fieldset>
                </div>
            </form>

            <div class="form-row">
            <fieldset class="form-group col-md-2">
                <label for="for_add_movil"></label>
                <button type="button" class="btn btn-success button mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal" ><i class="fas fa-plus"></i>  <i class="fas fa-ambulance"></i>  Asignar un Movil</button>
    
            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Asignación de Movil</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!--aca deberian ir los moviles de turno-->
                <fieldset class="form-group  col-md-12">
                                <select class="form-control" name="call_reception" id="movil">
                                    <option ></option>
                                    <option value="Movil 1" >Movil 1</option>
                                    <option value="Movil 3" >Movil 2</option>
                                    <option value="Movil 3" >Movil 3</option>
                                </select>
                        </fieldset>
            
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-success">Guardar Cambios</button>
                </div>
                </div>
            </div>
            </div>
            
            
            </fieldset>
            
            <form method="POST" action="{{ route('samu.call.addqtc' , $call) }}"  class="col-md-2">
            @csrf
            @method('POST')
            <fieldset class="form-group col-md">
                <label for="for_add_qtc"></label>
                <button type="button" class="btn btn-success button mb-3"  action="{{ route('samu.call.addqtc' , $call) }}"><i class="fas fa-search-plus"></i>  Asignar Seguimiento</button>
            </fieldset>
            </form>
        </div>




    </div>
</div>
@endsection