@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-car-crash"></i> Editar cometido {{ $event->id }}</h3>

<h4> Asignación de seguimiento y horarios</h4>
      
<form method="post" action="{{ route('samu.event.update', $event) }}">
    @csrf
    @method('PUT')

    @include('samu.event.form', [
        'event' => $event,
        'keys'  => $keys,
        'shift' => $shift
    ])

</form>

<br>

<h3>Llamadas relacionadas a este cometido</h3>

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
            @foreach($event->calls as $call)
            <tr>
                <td class="text-center">
                    <a href="{{ route('samu.call.edit',$call) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit"></i> {{ $call->id }}
                    </a>
                </td>
                <td>
                    {{ $call->classification }} 
                    @if($call->classification != 'OT')
                        - Event: 
                        @foreach($call->events as $event)
                            <a href="{{ route('samu.event.edit', $event) }}" class="link-primary"> {{ $event->id }}</a>, 
                        @endforeach
                    @endif
                </td>
                <td>{{ $call->hour }}</td>
                <td>{{ $call->applicant }}</td>
                <td>{{ $call->information }}</td>
                
                <td>{{ $call->address }}</td>
                <td>{{ $call->telephone }}</td>
                <td>{{ $call->receptor->officialFullName }}</td>
            </tr>
            @if($call->associatedCalls->isNotEmpty())
                @foreach($call->associatedCalls as $call)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('samu.call.edit',$call) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i> {{ $call->id }}
                        </a>
                    </td>
                    <td>
                        @if($call->classification)
                            {{ $call->classification }} 
                            @if($call->classification != 'OT')
                                - Evento: 
                                @foreach($call->events as $event)
                                    <a href="{{ route('samu.event.edit', $event) }}" class="link-primary"> {{ $event->id }}</a>, 
                                @endforeach
                            @endif
                        @endif

                        @if($call->referenceCall)
                            Referencia a: <a href="{{ route('samu.call.edit',$call->referenceCall) }}">{{ $call->referenceCall->id }}</a>
                        @endif
                    </td>
                    <td>{{ $call->hour }}</td>
                    <td>{{ $call->applicant }}</td>
                    <td>{{ $call->information }}</td>
                    
                    <td>{{ $call->address }}</td>
                    <td>{{ $call->telephone }}</td>
                    <td>{{ $call->receptor->officialFullName }}</td>
                </tr>
                @endforeach
            @endif
            @endforeach   
        </tbody>
    </table>

</div>
<!-- fin de registro de llamadas-->

@canany(['SAMU'])
<div>
    @include('partials.short_audit', ['audits' => $event->audits] )
</div>
@endcanany

<br>

@endsection

@section('custom_js')

@endsection