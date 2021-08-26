@extends('layouts.app')

@section('content')

@include('nav')


<h3 class="mb-3"><i class="fas fa-clipboard-list"></i> Listado Centro Regulador</h3>
<div class="card mb-3">
<div class="card-body">
        <div class="row mb-4">
            <div class="col-12 col-md-6">
                <form method="GET" class="form-horizontal" action="">
                    <div class="input-group mb-sm-0">
                        <input class="form-control" type="text" name="search" autocomplete="off" id="for_search"
                            style="text-transform: uppercase;"
                            placeholder="Nombre Jefe de Turno" value="" required>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 col-md-2">
                <a class="btn btn-success" href="{{ route('samu.regulatory-center.create') }}">
                    <i class="fas fa-plus"></i> Agregar
                </a>
            </div>
        </div>
        <div class="table-responsive">
            <table class="table table-sm table-bordered table-striped small">
                <thead>
                    <tr class="text-center table-success">
                        <th colspan="6"><b>25 de Agosto 2021</b></th>
                        </tr>
                    <tr class="text-center table-info">
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
                        <td>Juan Catro</td>
                        <td>Jossie Escobar</td>
                        <td> Maria Hurtado</td>
                        <td> Daniel Ramos, Sofia Castro, Daniel Martinez</td>
                        <td> Maria Muñoz, Jesus Aguirre</td>
                        <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                    </tr>
                    <tr class="text-center table-success">
                        <th colspan="6"><b>26 de Agosto 2021</b></th>
                        </tr>
                    <tr class="text-center table-info">
                        <th>Jefe de Turno</th>
                        <th>Médico Regulador</th>
                        <th>Enfermera Reguladora</th>
                        <th>Operadores</th>
                        <th>Despachadores</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Mariela Gomez</td>
                        <td>Alex Orozco</td>
                        <td> Maria Jose Padilla</td>
                        <td> camila Oyarce, David Villa, Genesis Cordova</td>
                        <td> Jesus Aguirre</td>
                        <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                    </tr>
                    <tr class="text-center table-success">
                        <th colspan="6"><b>25 de Agosto 2021</b></th>
                        </tr>
                    <tr class="text-center table-info">
                        <th>Jefe de Turno</th>
                        <th>Médico Regulador</th>
                        <th>Enfermera Reguladora</th>
                        <th>Operadores</th>
                        <th>Despachadores</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Juan Castro</td>
                        <td>Alex Orozco</td>
                        <td> Maria Hurtado</td>
                        <td> Sofia Castro, Camila Oyarce</td>
                        <td> Karin Gutierrez, Sebastian Lopez</td>
                        <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                    </tr>
                    <tr class="text-center table-success">
                        <th colspan="6"><b>25 de Agosto 2021</b></th>
                        </tr>
                    <tr class="text-center table-info">
                        <th>Jefe de Turno</th>
                        <th>Médico Regulador</th>
                        <th>Enfermera Reguladora</th>
                        <th>Operadores</th>
                        <th>Despachadores</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Juan Catro</td>
                        <td>Jossie Escobar</td>
                        <td> Maria Hurtado</td>
                        <td> Daniel Ramos, Sofia Castro, Daniel Martinez</td>
                        <td> Maria Muñoz, Jesus Aguirre</td>
                        <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                    </tr>
                    <tr class="text-center table-success">
                        <th colspan="6"><b>25 de Agosto 2021</b></th>
                        </tr>
                    <tr class="text-center table-info">
                        <th>Jefe de Turno</th>
                        <th>Médico Regulador</th>
                        <th>Enfermera Reguladora</th>
                        <th>Operadores</th>
                        <th>Despachadores</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Mariela Gomez</td>
                        <td>Alex Orozco</td>
                        <td> Maria Jose Padilla</td>
                        <td> camila Oyarce, David Villa, Genesis Cordova</td>
                        <td> Jesus Aguirre</td>
                        <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                    </tr>
                    <tr class="text-center table-success">
                        <th colspan="6"><b>25 de Agosto 2021</b></th>
                        </tr>
                    <tr class="text-center table-info">
                        <th>Jefe de Turno</th>
                        <th>Médico Regulador</th>
                        <th>Enfermera Reguladora</th>
                        <th>Operadores</th>
                        <th>Despachadores</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Juan Castro</td>
                        <td>Alex Orozco</td>
                        <td> Maria Hurtado</td>
                        <td> Sofia Castro, Camila Oyarce</td>
                        <td> Karin Gutierrez, Sebastian Lopez</td>
                        <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                    </tr>
                    <tr class="text-center table-success">
                        <th colspan="6"><b>25 de Agosto 2021</b></th>
                        </tr>
                    <tr class="text-center table-info">
                        <th>Jefe de Turno</th>
                        <th>Médico Regulador</th>
                        <th>Enfermera Reguladora</th>
                        <th>Operadores</th>
                        <th>Despachadores</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Juan Catro</td>
                        <td>Jossie Escobar</td>
                        <td> Maria Hurtado</td>
                        <td> Daniel Ramos, Sofia Castro, Daniel Martinez</td>
                        <td> Maria Muñoz, Jesus Aguirre</td>
                        <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                    </tr>
                    <tr class="text-center table-success">
                        <th colspan="6"><b>25 de Agosto 2021</b></th>
                        </tr>
                    <tr class="text-center table-info">
                        <th>Jefe de Turno</th>
                        <th>Médico Regulador</th>
                        <th>Enfermera Reguladora</th>
                        <th>Operadores</th>
                        <th>Despachadores</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Mariela Gomez</td>
                        <td>Alex Orozco</td>
                        <td> Maria Jose Padilla</td>
                        <td> camila Oyarce, David Villa, Genesis Cordova</td>
                        <td> Jesus Aguirre</td>
                        <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                    </tr>
                    <tr class="text-center table-success">
                        <th colspan="6"><b>25 de Agosto 2021</b></th>
                        </tr>
                    <tr class="text-center table-info">
                        <th>Jefe de Turno</th>
                        <th>Médico Regulador</th>
                        <th>Enfermera Reguladora</th>
                        <th>Operadores</th>
                        <th>Despachadores</th>
                        <th></th>
                    </tr>
                    <tr>
                        <td>Juan Castro</td>
                        <td>Alex Orozco</td>
                        <td> Maria Hurtado</td>
                        <td> Sofia Castro, Camila Oyarce</td>
                        <td> Karin Gutierrez, Sebastian Lopez</td>
                        <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                    </tr>
                
                </tbody>
            </table>

        <hr>
        
        </div>
</div>
</div>

@endsection
