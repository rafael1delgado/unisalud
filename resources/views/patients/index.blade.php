@extends('layouts.ssi')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Listado de pacientes FHIR</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Exportar</button>
        </div>
    </div>
</div>
<table class="table">
<thead class="border">
    <tr>
        <th class="px-4 py-2 font-bold">Index</th>
        <th class="px-4 py-2 font-bold">Nombre</th>
        <th class="px-4 py-2 font-bold">F.Nacimiento</th>
        <th class="px-4 py-2 font-bold">Genero</th>
    </tr>
</thead>
<tbody class="border">
    @foreach($patients as $key => $patient)
        <tr>
            <td class="px-4 py-2">{{ ++$key }}</td>
            <td class="px-4 py-2">
                {{ implode(' ',$patient['resource']['name'][0]['given']) ?? '' }}
            </td>
            <td class="px-4 py-2">{{ $patient['resource']['birthDate'] }}</td>
            <td class="px-4 py-2">{{ $patient['resource']['gender'] }}</td>
        </tr>
    @endforeach
</tbody>
</table>
@endsection
