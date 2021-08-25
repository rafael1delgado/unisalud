@extends('layouts.app')

@section('content')
@include('nav')

<h3 class="mb-3"><i class="fas fa-user-clock"></i> Apertura de Turno</h3>
<!--inicio-->

<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">

   
        <div class="form-row">
                <fieldset class="form-group  col-md-4">
                    <label for="for_run"><b>Fecha de registro</b> </label>
                    <input type="hidden" class="form-control" id="for_id" name="id" value="">
                    <input type="date" class="form-control" name="date" value="">
                </fieldset>
                <fieldset class="form-group  col-md-2">
                    <label for="for_run"><i class="fas fa-clock"></i><b> Hora Apertura de turno</b> </label>
                    <input type="hidden" class="form-control"  name="hora" value="18:23">
                    <input type="time" class="form-control" name="hora" value="">
                </fieldset>
                <fieldset class="form-group  col-md-2">
                    <label for="for_run"><i class="fas fa-clock"></i><b> Hora Cierre de turno</b> </label>
                    <input type="hidden" class="form-control"  name="hora" value="18:23">
                    <input type="time" class="form-control" name="hora" value="">
                </fieldset>
                <div class="col-12 col-md-2 mt-4">
                            <a class="btn btn-success " href="{{ route('samu.regulatory-center.create') }}">
                            <i class="fas fa-plus"></i> Agregar Centro Regulador
                        </a>
                </div>
            
                <div class="col-12 col-md-2 mt-4">
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
                <div class="table-responsive col-md-6">
                    <table class="table table-sm table-bordered table-striped small">
                            <thead>
                            <tr class="text-center table-info">
                              
                              
                              <th colspan="7"><b>DETALLES DE MOVILES</b></th>
                              
                          </tr>
                                <tr class="text-center table-success">
                                    <th>Número</th>
                                    <th>Tipo</th>
                                    <th>Estado</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>2</td>
                                    <td>Movil 2</td>
                                    <td>Activo</td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>14</td>
                                    <td>Movil 5</td>
                                    <td>Activo</td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Movil 12</td>
                                    <td>Activo</td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>44</td>
                                    <td>Movil 6</td>
                                    <td>Activo</td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>10</td>
                                    <td>Movil 4 </td>
                                    <td>Activo</td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                                <tr>
                                    <td>5</td>
                                    <td>Movil 11</td>
                                    <td>Inactivo</td>
                                    <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                                </tr>
                            </tbody>
                        </table>
                </div>

                <div class="table-responsive col-md-6">
                    <table class="table table-sm table-bordered table-striped small">
                        <thead>
                        
                            <tr class="text-center table-info">
                              
                              <th colspan="7"><b>DETALLES DE TURNOS</b></th>
                            </tr>
                        
                            <tr class="text-center table-success">
                              
                                <th>Fecha de Registro</th>
                                <th>Hora de apertura</th>
                                <th>Hora de cierre de Turno</th>
                                <th>Detalle de Centro Regulador</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>25-08-2021</td>
                                <td>08:00</td>
                                <td>16:00</td>
                                <td class="text-center" >
                               
                                    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        CENTRO REGULADOR
                                        Jefe de turno: Maria Hidalgo
                                        Médico Regulador: Daniel Lopez
                                        Enfermera Reguladora: Juan Martinez
                                        Operador 1: Camila Rios
                                        Operador 2: Cristian Valencia
                                        Operador 3: Daniel Medina
                                        Operador 4: Marta Duran
                                        Despachador 1: Miguel Rojas
                                     ">
                                                        Ver Centro Regulador</button>
                                </td>
                               
                            </tr>
                            <tr>
                                <td>25-08-2021</td>
                                <td>16:00</td>
                                <td>00:00</td>
                                <td class="text-center" >
                               
                                    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        CENTRO REGULADOR
                                        Jefe de turno: Alvaro Perez
                                        Médico Regulador: Joge Corvalan
                                        Enfermera Reguladora: Daniela Rios
                                        Operador 1: Pedro Lagos
                                        Operador 2: Carla Araya
                                        Despachador 1: Andrea Rojas
                                     ">
                                                        Ver Centro Regulador</button>
                                </td>
                               
                            </tr>
                            <tr>
                                <td>26-08-2021</td>
                                <td>00:00</td>
                                <td>08:00</td>
                                <td class="text-center" >
                               
                                    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        CENTRO REGULADOR
                                        Jefe de turno: Julio Perez
                                        Médico Regulador:   Doris Alcocer
                                        Enfermera Reguladora: Maria Reyes
                                        Operador 1: Santigo Vidal
                                        Operador 2: Maria Mendoza
                                        Operador 3: Paul Veizaga
                                        Despachador 1: Iris Gallardo

                                     ">
                                                        Ver Centro Regulador</button>
                                </td>
                               
                            </tr>
                            <tr>
                                <td>26-08-2021</td>
                                <td>08:00</td>
                                <td>16:00</td>
                                <td class="text-center" >
                               
                                    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        CENTRO REGULADOR
                                        Jefe de turno: Jose Carrera
                                        Médico Regulador:   Doris Alcocer
                                        Enfermera Reguladora: Maria Reyes
                                        Operador 1: Carla Caipa
                                        Operador 2: David Rojas
                                        Operador 3: Belen Garcia
                                        Operador 4: Carolina Moscoso
                                        Despachador 1: Denis Reyes

                                     ">
                                                        Ver Centro Regulador</button>
                                </td>
                               
                            </tr>
                            <tr>
                                <td>27-08-2021</td>
                                <td>16:00</td>
                                <td class="text-center" >
                               
                                    
                               <button type="button" 
                               class="btn  btn-danger btn-center" >Terminar Turno</button>
                           </td>
                                <td class="text-center" >
                               
                                    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        CENTRO REGULADOR
                                        Jefe de turno: Jose Carrera
                                        Médico Regulador:   Doris Alcocer
                                        Enfermera Reguladora: Maria Reyes
                                        Operador 1: Carla Caipa
                                        Operador 2: David Rojas
                                        Operador 3: Belen Garcia
                                        Operador 4: Carolina Moscoso
                                        Despachador 1: Denis Reyes

                                     ">
                                                        Ver Centro Regulador</button>
                                </td>
                               
                            </tr>
                            


                           
                        </tbody>
                    </table>
                </div>
            </div>
            <hr>
            <!-- registro de llamadas-->
            <h3><i class="fas fa-book"></i> Registro de Novedades del turno</h3>
           <div class="form-row">
                <div class="mb-3 col-md-10">
                    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="" required></textarea>
                    <div class="invalid-feedback">
                    Ingrese las novedades del turno
                    </div>
                </div>
                <fieldset class="form-group col-md-2">
                    <label for="for_run"><br /> <br /><br /></label>
                    <button type="submit" class="btn btn-primary button mb-4" >Guardar</button>
                </fieldset>
           </div>
                <!-- fin de registro de llamadas-->
        
          <!--estado de las personas en turno
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

