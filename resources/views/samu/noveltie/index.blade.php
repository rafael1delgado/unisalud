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
            @if($shift)
                <form method="POST" action="{{ route('samu.noveltie.store') }}">
                        @csrf
                        @method('POST')
                    <div class="form-row">
                            <div class="mb-3 col-md-11">
                                <textarea class="form-control" id="validationTextarea" name="detail" placeholder="" required></textarea>
                                <div class="invalid-feedback">
                                Ingrese las novedades del turno
                                </div>
                            </div>
                            <fieldset class="form-group col-md-1">
                                <label for="for_run"><br /> <br /><br /></label>
                                <button type="submit" class="btn btn-primary button mb-4" >Guardar</button>
                            </fieldset>
                    </div>
                </form>
            @endif
          
           <div class="table-responsive col-md-12">
                    <table class="table table-sm table-bordered table-striped small">
                    @foreach($novelties as $noveltie)
                        <thead>
                            <tr class="text-center table-info">
                              
                              <th colspan="5"><b>DETALLES DE NOVEDADES</b></th>
                            </tr>
                            
                            <tr class="text-center table-success">
                              <th colspan="3"><b>{{ $noveltie->shift['date'] }}</b></th>
                              <th colspan="2"><b>NOVEDADES</b></th>
                            </tr>
                        
                            <tr class="text-center table-secondary">
                              
                                <th>Turno</th>
                                <th>Hora de apertura Turno</th>
                                <th>Hora de cierre de Turno</th>
                                <th>Detalle de Novedades</th>
                                <th>Editar</th>

                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $noveltie->shift['type'] }}</td>
                                <td>{{ $noveltie->shift['opening_time'] }}</td>
                                <td>{{ $noveltie->shift['closing_time']}}</td>
                         
                                <td>{{$noveltie->detail?? ''}} </td>
                                <td class="text-center">
                                 <a href="{{ route('samu.noveltie.edit', $noveltie) }}">

                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                    </table>
                </div>
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
