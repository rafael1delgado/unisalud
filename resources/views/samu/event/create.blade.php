@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3">
    @if(request()->routeIs('samu.event.create'))
        <i class="fas fa-car-crash"></i> 
        Nuevo cometido {{ $nextCounter }}
        @if($call)
            - Relacionada con la llamada ID: {{ $call->id }}
        @endif
    @else
        <i class="fas fa-car-crash"></i>
        @if($event)
            Duplicando cometido Nº {{ $event->id }}, con nuevo Nº {{ $nextCounter }}
        @endif
    @endif
</h3>

@if($event)
<h4 class="mt-3">Llamadas relacionadas a este cometido</h4>

<div class="table-responsive">

    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr class="text-center table-primary">
                <th>Id</th>
                <th>Clasificación</th>
                <th nowrap>Hora</th>
                <th>Solicitante</th>
                <th>Información telefonica</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Receptor de llamada</th>
            </tr>
        </thead>
        <tbody>
            @if($event->call)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('samu.call.edit', $event->call) }}" class="btn btn-sm btn-primary">
                            <i class="fas fa-edit"></i> {{ $event->call->id }}
                        </a>
                    </td>
                    <td>
                        {{ $event->call->classification }} 
                    </td>
                    <td>{{ $event->call->hour }}</td>
                    <td>{{ $event->call->applicant }}</td>
                    <td>
                        {{ $event->call->sex_abbr }} 
                        {{ $event->call->age_format }} 
                        {{ $event->call->information }}
                    </td>
                    <td>{{ $event->call->address }}</td>
                    <td>{{ $event->call->telephone }}</td>
                    <td>{{ $event->call->receptor->officialFullName }}</td>
                </tr>
                @foreach($event->call->associatedCalls as $associatedCall)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('samu.call.edit', $associatedCall) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i> {{ $associatedCall->id }}
                        </a>
                    </td>
                    <td>
                        {{ $associatedCall->classification }}
                        @if($associatedCall->referenceCall)
                        Referencia a: 
                        <a href="{{ route('samu.call.edit',$associatedCall->referenceCall) }}">
                            {{ $associatedCall->referenceCall->id }}
                        </a>
                    @endif
                    </td>
                    <td>{{ $associatedCall->hour }}</td>
                    <td>{{ $associatedCall->applicant }}</td>
                    <td>
                        {{ $associatedCall->sex_abbr }} 
                        {{ $associatedCall->age_format }} 
                        {{ $associatedCall->information }}
                    </td>
                    <td>{{ $associatedCall->address }}</td>
                    <td>{{ $associatedCall->telephone }}</td>
                    <td>{{ $associatedCall->receptor->officialFullName }}</td>
                </tr>
                @endforeach
            @else 
                <tr>
                    <td class="text-center" colspan="8">
                        No hay llamadas relacionadas a este cometido.
                    </td>
                </tr>
            @endif
        </tbody>
    </table>

</div>
@endif

<form method="post" action="{{ request()->routeIs('samu.event.create') ? route('samu.event.store', $call) : route('samu.event.store.duplicate', $event) }}">
 
    @csrf
    @method('POST')

    @include('samu.event.form', [
        'event' => $event,
        'call'  => $call,
        'keys'  => $keys,
        'shift' => $shift,
    ])

    <button type="submit" class="btn btn-primary">
        @if(request()->routeIs('samu.event.create'))
            <i class="fas fa-save"></i> Guardar
        @else
            <i class="fas fa-copy"></i> Duplicar
        @endif
    </button>

    <a href="{{ route('samu.event.index') }}" class="btn btn-outline-secondary">
        Cancelar
    </a>

</form>

<br>

@endsection

@section('custom_js')

@endsection