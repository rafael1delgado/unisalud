@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-car-crash"></i> Nuevo cometido {{ $nextCounter }}</h3>

<h4> Asignación de seguimiento y horarios</h4>
      
<form method="post" action="{{ route('samu.event.store') }}">
    @csrf
    @method('POST')

    @include('samu.event.form', [
        'event' => null,
        'keys'  => $keys,
        'shift' => $shift
    ])

</form>

<br>

@endsection

@section('custom_js')

@endsection