@extends('layouts.ssi')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mis resultados de exámenes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        </div>
    </div>
</div>

<div class="alert alert-info" role="alert">
    Actualmente no encontramos resultados de examenes suyos registrados en nuestra base de datos.
</div>

@can('dev')
<pre class="small">{{ print_r($user) }}</pre>
@endcan

@endsection
