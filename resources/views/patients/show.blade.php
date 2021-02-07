@extends('layouts.ssi')

@section('title', 'Ver paciente')

@section('content')
<h3 class="mt-3">Ver paciente</h3>

{!! $patient['text']['div'] !!}

@endsection

@section('custom_js')

@endsection
