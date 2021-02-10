@extends('layouts.ssi')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mis resultados de exámenes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        </div>
    </div>
</div>

@if($response['total'] > 0)
    <ul>
    @foreach($response['entry'] as $entry)
        <li>
            <b>Fecha Resultado</b>
            {{ $entry['resource']['effectiveDateTime']}}
            <b>Resultado</b>
            {{ $entry['resource']['valueCodeableConcept']['text'] }}
            <b>ID Esmeralda</b>
            {{ $id = $entry['resource']['identifier'][0]['value'] }}
            <a target='_blank' href="{{ \Storage::temporaryUrl('esmeralda/informs/'.$id.'.pdf', now()->addMinutes(5)) }}">Informe</a>
        </li>
    @endforeach
    </ul>
@else
<div class="alert alert-info" role="alert">
    Actualmente no encontramos resultados de examenes en nuestra base de datos.
</div>
@endif

@can('dev')
<pre class="small">{{ print_r($user) }}</pre>
@endcan

@endsection
