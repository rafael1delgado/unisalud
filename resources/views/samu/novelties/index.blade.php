@extends('layouts.app')

@section('content')
@include('nav')

<h3 class="mb-3"><i class="fas fa-book-reader"></i> Registro de Novedades del turno</h3>
<!--inicio-->

<style>
 .button1{
     margin-top:30px;
     }
</style>

<div class="card mb-3">
    <div class="card-body">
            <!-- registro de llamadas-->
            <h3><i class="fas fa-book"> Novedades</i></h3>
           <div class="form-row">
                <div class="mb-3 col-md-11">
                    <textarea class="form-control is-invalid" id="validationTextarea" placeholder="" required></textarea>
                    <div class="invalid-feedback">
                    Ingrese las novedades del turno
                    </div>
                </div>
                <fieldset class="form-group col-md-1">
                    <label for="for_run"><br /> <br /><br /></label>
                    <button type="submit" class="btn btn-primary button mb-4" >Guardar</button>
                </fieldset>
           </div>

           <div class="table-responsive col-md-12">
                    <table class="table table-sm table-bordered table-striped small">
                        <thead>
                        
                            <tr class="text-center table-info">
                              
                              <th colspan="5"><b>DETALLES DE NOVEDADES</b></th>
                            </tr>
                            
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                              <th colspan="2"><b>NOVEDADES</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Turno</th>
                                <th>Hora de apertura Turno</th>
                                <th>Hora de cierre de Turno</th>
                                <th>Detalle de Novedades</th>
                                <th></th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Largo</td>
                                <td>08:00</td>
                                <td>22:00</td>
                                <td>R12 Informa que movil 363 se va a taller </td>
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>

                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>25 DE AGOSTO DEL 2021</b></th>
                              <th colspan="2"><b>NOVEDADES</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Turno</th>
                                <th>Hora de apertura Turno</th>
                                <th>Hora de cierre de Turno</th>
                                <th>Detalle de Novedades</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td>Noche</td>
                                <td>22:00</td>
                                <td>08:00</td>
                                <td>Sin novedades</td>
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>26 DE AGOSTO DEL 2021</b></th>
                              <th colspan="2"><b>NOVEDADES</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Turno</th>
                                <th>Hora de apertura Turno</th>
                                <th>Hora de cierre de Turno</th>
                                <th>Detalle de Novedades</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td>Largo</td>
                                <td>08:00</td>
                                <td>22:00</td>
                                <td>Sin novedades</td>
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>26 DE AGOSTO DEL 2021</b></th>
                              <th colspan="2"><b>NOVEDADES</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Turno</th>
                                <th>Hora de apertura Turno</th>
                                <th>Hora de cierre de Turno</th>
                                <th>Detalle de Novedades</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td>Noche</td>
                                <td>22:00</td>
                                <td>08:00</td>
                                <td>Sin novedades</td>
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>
                            <tr class="text-center table-success">
                              
                              <th colspan="3"><b>27 DE AGOSTO DEL 2021</b></th>
                              <th colspan="2"><b>NOVEDADES</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Turno</th>
                                <th>Hora de apertura Turno</th>
                                <th>Hora de cierre de Turno</th>
                                <th>Detalle de Novedades</th>
                                <th></th>

                            </tr>
                            <tr>
                                <td>Largo</td>
                                <td>08:00</td>
                                <td>22:00</td>
                                <td>Se informa que Movil 922 queda reservado con traslado de paciente a las 09:30 </td>
                                <td><a href="{{ route('samu.regulatory-center.edit') }}">Editar</a> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

    </div>
</div>



@endsection
