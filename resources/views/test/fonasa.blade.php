@extends('layouts.app')

@section('content')

Entidad Fonasa:
{{ env('FONASA_ENTIDAD') }}

@php
$usuario  = App\Models\WebService\Fonasa::find(15287582);
@endphp

<pre>
{{ print_r($usuario) }}
</pre>

@endsection