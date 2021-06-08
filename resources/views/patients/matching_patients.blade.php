@extends('layouts.app')

@section('title', 'Ver paciente')

@section('content')

    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Pacientes encontrados</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group mr-2">

            </div>
        </div>
    </div>


<table class="table table-bordered">
        <thead>
            <tr>
                <th>Index</th>
                <th>Nombre</th>
                <th>F.Nacimiento</th>
                <th>Genero</th>
            </tr>
        </thead>
        <tbody>
            @foreach($matchingPatients as $key => $patient)
                <tr>
                    <td>{{ ++$key }}</td>
                    <td>
                        <a href="{{ route('patient.edit',$patient->id)}}">
                            {{ "{$patient->officialFullName}"  }}
                        </a>
                    </td>
                    <td>{{ $patient->birthday ?? ''}}</td>
                    <td>{{ $patient->gender ?? ''}}</td>
                </tr>
            @endforeach
        </tbody>
    </table>>


@endsection

@section('custom_js')

@endsection
