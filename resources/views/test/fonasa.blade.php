@extends('layouts.app')

@section('content')

Fonasa

@php
$usuario  = App\Models\WebService\Fonasa::find(15287582);
@endphp

<pre>
{{ print_r($usuario) }}
</pre>

@endsection