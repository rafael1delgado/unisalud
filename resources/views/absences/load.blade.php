@extends('layouts.app')

@section('title', 'Importar ausentismos')

@section('content')

<h3 class="mb-3">Importar ausentismos</h3>

<form id="importForm" method="POST" class="form-horizontal" action="{{ route('absences.import') }}" enctype="multipart/form-data">
    @csrf
    @method('POST')
    <div class="input-group">
        <div class="custom-file">
            <input type="file" class="custom-file-input" name="file" accept=".xlsx, .xls, .csv" id="inputGroupFile04" aria-describedby="submit">
            <label class="custom-file-label" for="inputGroupFile04">Elegir archivo excel</label>
        </div>
        <div class="input-group-append">
            <button class="btn btn-outline-secondary" type="submit" id="btnSubmit">Importar</button>
        </div>
    </div>
</form>
<br>

@if(Session::has('results'))
<div class="alert alert-info" role="alert">
    <strong>Resultados: </strong>
    <ul>
        <li>Nombre: {{Session::get('results')[0]}}</li>
        <li>Tamaño: {{Session::get('results')[1]}}</li>
        <li>Filas importadas: {{Session::get('results')[2]}} de {{Session::get('results')[3]}}</li>
        <li>Tiempo de ejecución: {{Session::get('results')[4]}}s</li>
    </ul>
</div>
@endif

@if(Session::has('failures'))
<div class="alert alert-warning" role="alert">
    <strong>Errores encontrados:</strong>
    @php($grouped = Session::get('failures')->groupBy(function($item, $key){
        return $item->row();
    }))
    <ul>
    @foreach($grouped as $row => $failures)
        <li>Fila {{ $row }}:
        @foreach($failures as $failure)
        {{ implode(' ', $failure->errors()) }} 
        @endforeach
        </li>
    @endforeach
    </ul>
</div>
@endif

@endsection

@section('custom_js')
<script>
var form = document.getElementById('importForm');
var submitButton = document.getElementById('btnSubmit');

form.addEventListener('submit', function() {
   // Disable the submit button
   submitButton.setAttribute('disabled', 'disabled');
   // Change the "Submit" text
   submitButton.innerHTML = '<i class="spinner-border spinner-border-sm"></i> Cargando...';
}, false);
</script>
@endsection