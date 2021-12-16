@extends('layouts.app')

@section('content')
<h4 class="mb-3">Listado de Solicitudes de Examenes de Chagas de {{$tray}}</h4>

<div class="table-responsive">
    <table class="table table-sm table-bordered" id="tabla_casos">
        <thead>
            <tr>
                <th nowrap>ID</th>
                <th>Fecha muestra</th>
                <th>Origen</th>
                <th>Nombre</th>
                <th>RUN</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Fecha de Resultado Tamizaje</th>
                <th>Resultado Tamizaje</th>
                <th>Fecha de Resultado Confirmación</th>
                <th>Resultado Confirmación</th>
                <th>Observación</th>
            </tr>
        </thead>


        @can('Epi: Add Value')
        <tbody id="tableCases">        
            @foreach($suspectcases as $suspectcase)
            <tr>
                <td>{{$suspectcase->id??''}} <a href="{{ route('epi.chagas.edit',$suspectcase) }}" pclass="btn_edit"><i class="fas fa-edit"></i></a></td>
                <td>{{$suspectcase->sample_at? $suspectcase->sample_at: ''}}</td>
                <td>{{$suspectcase->organization->alias??''}}</td>
                <td>{{$suspectcase->patient->OfficialFullName ??''}}</td>
                <td>{{$suspectcase->patient->identifierRun->value ??''}}-{{$suspectcase->patient->identifierRun->dv}}</td>
                <td>
                {{\Carbon\Carbon::parse($suspectcase->patient->birthday)->age}}
                </td>
                <td>{{$suspectcase->patient->sex ??''}}</td>
                <td>{{$suspectcase->chagas_result_screening_at ??''}}</td>
                <td>{{$suspectcase->chagas_result_screening ?? ''}}</td>
                <td>{{$suspectcase->chagas_result_confirmation_at ??''}}</td>
                <td>{{$suspectcase->chagas_result_confirmation}}</td>
                <td>{{$suspectcase->observatio??''}}</td>
            </tr>
            @endforeach
        </tbody>
        @endcan
    </table>

</div>


@endsection

@section('custom_js')

@endsection