@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Mis datos personales</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group mr-2">
        @if($user)
            <a class="btn btn-sm btn-outline-secondary" href="{{ route('profile.edit') }}" >Editar</a>
        @endif
        </div>
    </div>
</div>

{{-- @if($user)
    {!! $user['text']['div'] !!}
@else --}}
    <p><b>RUN:</b> {{ auth()->user()->identifierRun->value }}-{{ auth()->user()->identifierRun->dv }}</p>
    <p><b>Nombre:</b> {{ auth()->user()->officialFullname }}</p>
{{-- @endif --}}

@can('Developer')
<pre class="small">{{ print_r($user) }}</pre>
@endcan

@endsection
