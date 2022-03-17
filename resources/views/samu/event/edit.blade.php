@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row">
    <div class="col">
        <h3 class="mb-3"><i class="fas fa-car-crash"></i> Editar cometido {{ $event->id }}</h3>
    </div>
    <div class="col text-right">
        @can('SAMU administrador')
            @if($event->status AND !$event->trashed())
            <form method="POST" action="{{ route('samu.event.destroy', $event) }}">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-sm btn-danger" title="Eliminar Cometido">
                    <i class="fas fa-trash"></i> Eliminar Cometido
                </button>
            </form>
            @endif
        @endcan
    </div>
</div>

@if($event->status)
<form method="post" action="{{ route('samu.event.update', $event) }}">
@endif

    @csrf
    @method('PUT')

    @include('samu.event.form', [
        'call'  => null,
        'event' => $event,
        'keys'  => $keys,
        'shift' => $shift,
    ])

    @if($event->status)
        <button type="submit" name="btn_save" class="btn btn-primary">
            <i class="fas fa-save"></i> Guardar
        </button>
        
        <button type="submit" name="btn_save_close" id="btn_save_close" class="btn btn-success float-right">
            <i class="fas fa-lock"></i> Guardar y cerrar
        </button>

        <input type="hidden" id="save_close" name="save_close" value="no">
    @else
        @can('SAMU administrador')
            <a class="btn btn-secondary" target="_blank"  href="{{ route('samu.event.report',$event) }}">
                <i class="fas fa-print"></i> Imprimir
            </a>
            @if( $event->created_at->gt(now()->subDays(30)) )
            <a class="btn btn-warning float-right" href="{{ route('samu.event.reopen',$event) }}">
                <i class="fas fa-lock-open"></i> Reabrir < 30 días
            </a>
            @endif
        @endcan
    @endif
    
    <a href="{{ route('samu.event.index') }}" class="btn btn-outline-secondary">Cancelar</a>
    
@if($event->status)    
</form>
@endif

<br>

<h3 class="mt-3">Llamadas relacionadas a este cometido</h3>

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
                <td>{{ $call->sex_abbr }} {{ $call->age_format }} {{ $call->information }}</td>
                
                <td>{{ $call->address }}</td>
                <td>{{ $call->telephone }}</td>
                <td>{{ $call->receptor->officialFullName }}</td>
            </tr>
            @if($call->associatedCalls->isNotEmpty())
                @foreach($call->associatedCalls->reverse() as $call)
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
    <script>
        $("#btn_save_close").click(function(event) {
            $('#save_close').val("yes");
        });
    </script>
@endsection
