@extends('layouts.app')

@section('content')

@include('nav')


<h3 class="mb-3"><i class="fas fa-clipboard-list"></i> Listado de Turnos</h3>
<div class="card mb-3">
<div class="card-body">
<div class="form-row">
                <fieldset class="form-group  col-md-6">
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
                <fieldset class="form-group  col-md-2 mt-1">
                    <div class=" mt-4">
                                <a class="btn btn-success " href="{{ route('samu.regulatory-center.create') }}">
                                <i class="fas fa-plus"></i> Agregar Centro Regulador
                            </a>
                    </div>
                </fieldset>
            
 
        <div class="table-responsive col-md-12">
                    <table class="table table-sm table-bordered table-striped small">
                        <thead>
                        
                            <tr class="text-center table-info">
                              
                              <th colspan="9"><b>DETALLES DE TURNOS</b></th>
                            </tr>
                            
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>CENTRO REGULADOR</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Turno</th>
                                <th>Hora de apertura Turno</th>
                                <th>Hora de cierre de Turno</th>
                                <th>Jefe de Turno</th>
                                <th>Médico Regulador</th>
                                <th>Enfermera Reguladora</th>
                                <th>Operadores</th>
                                <th>Despachadores</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Largo</td>
                                <td>08:00</td>
                                <td>20:00</td>
                                <td>Juan Catro</td>
                                <td>Jossie Escobar</td>
                                <td>Maria Hurtado</td>
                                <td class="text-center">    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    title="
                                        OPERADORES:
                                        Operador 1: Daniel Ramos
                                        Operador 2: Sofia Castro
                                        Operador 3:  Daniel Martinez
                                        "> Ver Operadores </button>
                                </td>
                                
                                <td class="text-center">
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        DESPACHADORES:
                                        
                                        Despachador 1: Maria Muñoz
                                        Despachador 2: Jesus Aguirre
                                        
                                     ">
                                                        Ver Despachadores</button>
                                </td>
                                
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>

                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>CENTRO REGULADOR</b></th>
                            </tr>
                            <tr>
                                <td>Noche</td>
                                <td>20:00</td>
                                <td>08:00</td>
                                <td>Mariela Gomez</td>
                                <td>Alex Orozco</td>
                                <td>Maria Jose Padilla</td>
                                <td class="text-center">    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    title="
                                        OPERADORES:
                                        Operador 1: Camila Oyarce
                                        Operador 2: David Villa
                                        Operador 3: Genesis Cordova
                                        "> Ver Operadores </button>
                                </td>
                                
                                <td class="text-center">
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        DESPACHADORES:
                                        
                                        Despachador 1: Jesus Aguirre
                                        
                                     ">
                                                        Ver Despachadores</button>
                                </td>
                                
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>26 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>CENTRO REGULADOR</b></th>
                            </tr>
                            <tr>
                                <td>Largo</td>
                                <td>08:00</td>
                                <td>20:00</td>
                                <td>Melisa Castro</td>
                                <td>Carlos Fuentes</td>
                                <td>Maria Diaz</td>
                                <td class="text-center">    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    title="
                                        OPERADORES:
                                        Operador 1: Rosita Reyes
                                        Operador 2: Camila Cruz
                                        "> Ver Operadores </button>
                                </td>
                                
                                <td class="text-center">
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        DESPACHADORES:
                                        
                                        Despachador 1: Jose Daniel
                                        Despachador 2: Sebastian Lopez
                                        
                                     ">
                                                        Ver Despachadores</button>
                                </td>
                                
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>26 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>CENTRO REGULADOR</b></th>
                            </tr>
                            <tr>
                                <td>Noche</td>
                                <td>20:00</td>
                                <td>08:00</td>
                                <td>Manuel Rodriguez</td>
                                <td>Carolina Hurtado</td>
                                <td>Doris Perez</td>
                                <td class="text-center">    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    title="
                                        OPERADORES:
                                        Operador 1: Veronica Perez
                                        Operador 2: Jorge Corvalan
                                        Operador 3: Daniela Rios
                                        "> Ver Operadores </button>
                                </td>
                                
                                <td class="text-center">
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        DESPACHADORES:
                                        
                                        Despachador 1: Karin Gutierrez
                                        Despachador 2: Sebastian Lopez
                                        
                                     ">
                                                        Ver Despachadores</button>
                                </td>
                                
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>27 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>CENTRO REGULADOR</b></th>
                            </tr>
                            <tr>
                                <td>Largo</td>
                                <td>08:00</td>
                                <td>20:00</td>
                                <td>Cristian Carpio</td>
                                <td>Manuel Rojas</td>
                                <td>Lili Rocabado</td>
                                <td class="text-center">    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    title="
                                        OPERADORES:
                                        Operador 1: Sofia Castro
                                        Operador 2: Camila Oyarce
                                        "> Ver Operadores </button>
                                </td>
                                
                                <td class="text-center">
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        DESPACHADORES:
                                        
                                        Despachador 1: Karin Gutierrez
                                        Despachador 2: Sebastian Lopez
                                        
                                     ">
                                                        Ver Despachadores</button>
                                </td>
                                
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>27 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>CENTRO REGULADOR</b></th>
                            </tr>
                            <tr>
                                <td>Noche</td>
                                <td>08:00</td>
                                <td class="text-center" >    
                                    <button type="button" 
                                    class="btn  btn-danger btn-center" >Terminar Turno</button>
                                </td>
                                <td>Juan Castro</td>
                                <td>Alex Orozco</td>
                                <td>Maria Hurtado</td>
                                <td class="text-center">    
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                    data-placement="bottom"
                                    title="
                                        OPERADORES:
                                        Operador 1: Sofia Castro
                                        Operador 2: Camila Oyarce
                                        "> Ver Operadores </button>
                                </td>
                                
                                <td class="text-center">
                                    <button type="button" 
                                    class="btn  btn-success btn-center" 
                                    data-toggle="popover" 
                                   
                                    data-placement="bottom"
                                    
                                   title="
                                        DESPACHADORES:
                                        
                                        Despachador 1: Karin Gutierrez
                                        Despachador 2: Sebastian Lopez
                                        
                                     ">
                                                        Ver Despachadores</button>
                                </td>
                                
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
         

        <hr>
        
        </div>
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