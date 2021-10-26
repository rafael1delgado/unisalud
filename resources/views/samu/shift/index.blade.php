@extends('layouts.app')

@section('content')

@include('nav')


<div class="mb-3" style="font-size: 1.575rem;">
    <i class="fas fa-clipboard-list"></i>
    <span>Listado de Turnos</span>
    <a class="btn btn-success " href="{{ route('samu.shift.create') }}">
        <i class="fas fa-plus"></i> Crear turno
    </a>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="form-row">
            
            <div class="table-responsive col-md-12">
                <table class="table table-sm table-bordered table-striped small">
                    <thead>
                        <tr class="text-center table-info">
                            <th>Estado</th>
                            <th>Fecha</th>
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
                        @foreach($shifts as $shift)
                        <tr>
                            <td class="text-center">{{ $shift->status }}</td>
                            <td class="text-center">{{ $shift->date }}</td>
                            <td class="text-center">{{ $shift->type }}</td>
                            <td class="text-center">{{ $shift->opening_time }}</td>
                            <td class="text-center">{{ $shift->closing_time }}</td>
                            
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary" data-toggle="popover" data-placement="bottom" title=""><i class="far fa-eye"></i></button>
                                <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary" data-toggle="popover" data-placement="bottom" title=""><i class="far fa-eye"></i></button>
                                <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary" data-toggle="popover" data-placement="bottom" title=""><i class="far fa-eye"></i></button>
                                <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary" data-toggle="popover" data-placement="bottom" title=""><i class="far fa-eye"></i></button>
                                <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-primary" data-toggle="popover" data-placement="bottom" title=""><i class="far fa-eye"></i></button>
                                <button class="btn btn-sm btn-success"><i class="fas fa-plus"></i></button>
                                <button class="btn btn-sm btn-danger"><i class="fas fa-trash-alt"></i></button>
                            </td>
                            <td class="d-flex align-items-center justify-content-center">
                                <a href="{{ route('samu.shift.edit', $shift) }}">
                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                </a>
                                <form method="POST" action="{{ route('samu.shift.destroy' , $shift) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button " class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="11">
                                @livewire('samu.shift-user', ['shift_id' => $shift->id])
                            </td>
                        </tr>
                        @endforeach
                        {{--                         
                        <tr>
                            <td>Largo</td>
                            <td>08:00</td>
                            <td class="text-center" >    
                                <button type="button" 
                                class="btn  btn-danger btn-center" >Terminar Turno</button>
                            </td>
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
                            
                            <td><a href="{{ route('samu.shift.edit') }}">Editar</a> </td>
                        </tr>
                        <tr class="text-center table-success">
                            
                            <th colspan="3"><b>27 DE AGOSTO DEL 2021</b></th>
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
                            
                            <td><a href="{{ route('samu.shift.edit') }}">Editar</a> </td>
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
                            
                            <td><a href="{{ route('samu.shift.edit') }}">Editar</a> </td>
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
                            
                            <td><a href="{{ route('samu.shift.edit') }}">Editar</a> </td>
                        </tr>
                        <tr class="text-center table-success">
                            
                            <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
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
                            
                            <td><a href="{{ route('samu.shift.edit') }}">Editar</a> </td>
                        </tr>
                        <tr class="text-center table-success">
                            
                            <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                            <th colspan="6"><b>CENTRO REGULADOR</b></th>
                        </tr>
                        <tr>
                            <td>Noche</td>
                            <td>20:00</td>
                            <td>08:00</td>
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
                            
                            <td><a href="{{ route('samu.shift.edit') }}">Editar</a> </td>
                        </tr>
                        --}}
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