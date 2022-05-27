@extends('layouts.app')

@section('content')

<h2 class="mb-3">Autorizaciones</h2>
<a class="btn btn-primary mb-2" href="{{ route('aps.minor_authorizations.create',0) }}">
    <i class="fas fa-plus"></i> Agregar
</a>

@livewire('aps.minor-authorization-search',['minorAuthorizations' => $minorAuthorizations])

@endsection

@section('custom_js')

@endsection
