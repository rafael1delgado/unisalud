@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-car-crash"></i> Editar Qtc</h3>

<h4> Asignación de seguimiento y horarios</h4>
      
<form method="post" action="{{ route('samu.qtc.update', $qtc) }}">
    @csrf
    @method('PUT')

    @include('samu.qtc.form', [
        'qtc'   => $qtc,
        'keys'  => $keys,
        'shift' => $shift
    ])

</form>

<br>

@endsection

@section('custom_js')

@endsection