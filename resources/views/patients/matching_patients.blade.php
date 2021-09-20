@extends('layouts.app')

@section('title', 'Ver paciente')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Se encontraron pacientes con datos similares:</h1>
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
            <th>Opciones</th>
        </tr>
    </thead>
    <tbody>

        

        @foreach($matchingPatients as $key => $patient)
        <tr>
            <td>{{ ++$key }}</td>
            <td>
                <a href="{{ route('patient.edit', $patient->id)}}">
                    {{ "{$patient->officialFullName}"  }}
                </a>
            </td>
            <td>{{ $patient->birthday ?? ''}}</td>
            <td>{{ $patient->gender ?? ''}}</td>
            <td><a href="{{ route('patient.edit', $patient->id)}}" class="btn btn-primary" title='Utilizar datos ingresados para editar' > <i class="fas fa-edit"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
    
<form method="POST" class="form-horizontal" action="{{ route('patient.store') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <button class="btn btn-primary" type ="submit"> <i class="fas fa-save"></i> Guardar de todas formas</button>
</form>


@endsection

@section('custom_js')

@endsection