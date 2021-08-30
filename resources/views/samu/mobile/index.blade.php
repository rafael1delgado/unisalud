@extends('layouts.app')

@section('content')

@include('nav')


<h3 class="mb-3"><i class="fas fa-ambulance"></i> Listado de Moviles</h3>
<div class="card mb-3">
        <div class="card-body">
            <div class="form-row mb-3">
                <div class="col-12 col-md-8">
                    <form method="GET" class="form-horizontal" action="">
                        <div class="input-group mb-sm-0">
                            <input class="form-control" type="text" name="search" autocomplete="off" id="for_search"
                                style="text-transform: uppercase;"
                                placeholder="MOVIL" value="" required>
                            <div class="input-group-append">
                                <button type="submit" class="btn btn-primary"><i class="fas fa-search"></i> Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
                    
                <div class="col-12 col-md-4">
                    <a class="btn btn-success" href="{{ route('samu.mobile.create') }}">
                        <i class="fas fa-plus"></i> Agregar Moviles en turno
                    </a>
                </div>
            
            </div> 

            <div class="table-responsive col-md-12 mb-3 ">
                    <table class="table table-sm table-bordered table-striped small">
                        <thead>
                        
                            <tr class="text-center table-info">
                              
                              <th colspan="9"><b>DETALLES DE MOVILES DE TURNO</b></th>
                            </tr>
                            
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>TRIPULACIÓN</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Número</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Conductor</th>
                                <th>Paramédico</th>
                                <th>Reanimador</th>
                                <th>Médico</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>2</td>
                                <td>Móvil 2</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Mario Cortez</td>
                                <td>Sofia Valencia</td>
                                <td>Carlos Fuentes</td>
                                <td>Tiaren Reyes</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>123</td>
                                <td>Móvil 26</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Catalina Morales</td>
                                <td>Daniela Miranda</td>
                                <td>Carlos Campos</td>
                                <td>Marta Sanchez</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Móvil 18</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Doris Lupa</td>
                                <td>Carola Reyes</td>
                                <td>Daniel Diaz</td>
                                <td>Juan EstradaS </td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>45</td>
                                <td>Móvil 233</td>
                                <td class="bg-secondary text-center text-white">Inactivo</td>
                                <td>Carol Martinez</td>
                                <td>Sofia Escudero</td>
                                <td>Rodrigo Araya</td>
                                <td>Doris</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>TRIPULACIÓN</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Número</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Conductor</th>
                                <th>Paramédico</th>
                                <th>Reanimador</th>
                                <th>Médico</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Móvil 12</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Mirta Perez</td>
                                <td>Juan Revollo</td>
                                <td>Marta Sanchez</td>
                                <td>Jesus Valensuela</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>123</td>
                                <td>Móvil 26</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Catalina Morales</td>
                                <td>Daniela Miranda</td>
                                <td>Carlos Campos</td>
                                <td>Marta Sanchez</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Móvil 18</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Doris Lupa</td>
                                <td>Carola Reyes</td>
                                <td>Daniel Diaz</td>
                                <td>Juan EstradaS </td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>45</td>
                                <td>Móvil 233</td>
                                <td class="bg-secondary text-center text-white">Inactivo</td>
                                <td>Carol Martinez</td>
                                <td>Sofia Escudero</td>
                                <td>Rodrigo Araya</td>
                                <td>Doris</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>TRIPULACIÓN</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Número</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Conductor</th>
                                <th>Paramédico</th>
                                <th>Reanimador</th>
                                <th>Médico</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Móvil 11</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Mario Cortez</td>
                                <td>Victor Ureña</td>
                                <td>Sofia Valencia</td>
                                <td>Najhely Cabrera</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>123</td>
                                <td>Móvil 26</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Catalina Morales</td>
                                <td>Daniela Miranda</td>
                                <td>Carlos Campos</td>
                                <td>Marta Sanchez</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                         
                            <tr>
                                <td>45</td>
                                <td>Móvil 233</td>
                                <td class="bg-secondary text-center text-white">Inactivo</td>
                                <td>Carol Martinez</td>
                                <td>Sofia Escudero</td>
                                <td>Rodrigo Araya</td>
                                <td>Doris</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>TRIPULACIÓN</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Número</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Conductor</th>
                                <th>Paramédico</th>
                                <th>Reanimador</th>
                                <th>Médico</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Móvil 15</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Agustina Morales</td>
                                <td>Helen Arevalos</td>
                                <td>Carlos Fuentes</td>
                                <td>Jesus Valensuela</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                              <th colspan="6"><b>TRIPULACIÓN</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Número</th>
                                <th>Tipo</th>
                                <th>Estado</th>
                                <th>Conductor</th>
                                <th>Paramédico</th>
                                <th>Reanimador</th>
                                <th>Médico</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Móvil 11</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Mario Cortez</td>
                                <td>Victor Ureña</td>
                                <td>Sofia Valencia</td>
                                <td>Najhely Cabrera</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>8</td>
                                <td>Móvil 15</td>
                                <td class="bg-success text-center text-white">Activo</td>
                                <td>Agustina Morales</td>
                                <td>Helen Arevalos</td>
                                <td>Carlos Fuentes</td>
                                <td>Jesus Valensuela</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>10</td>
                                <td>Móvil 4</td>
                                <td class="bg-secondary text-center text-white">Inactivo</td>
                                <td>Rosmery Rios</td>
                                <td>Andy Guzman</td>
                                <td>Juan Pablo Cardenas</td>
                                <td>Duglas Trujillo</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>
                            <tr>
                                <td>45</td>
                                <td>Móvil 233</td>
                                <td class="bg-secondary text-center text-white">Inactivo</td>
                                <td>Carol Martinez</td>
                                <td>Sofia Escudero</td>
                                <td>Rodrigo Araya</td>
                                <td>Doris</td>
                                <td><a href="{{ route('samu.mobile.edit') }}">Editar</a> </td>
                            </tr>

                          
                        </tbody>
                    </table>
                </div>
            </div>
         

            <hr>
        
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
