@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-phone"></i> Orientaciones télefónicas</h3>

@unless($openShift)
    <div class="alert alert-warning" role="alert">
        No hay un turno abierto
    </div>
@endunless

@foreach([$openShift,$lastShift] as $shift)
    @unless($shift == null)
    <h3>Registro de llamadas <small>Turno: {{ optional(optional($shift)->opening_at)->format('Y-m-d H:i') }}</small></h3>

    <div class="table-responsive">

        <table class="table table-sm table-bordered table-striped">
            <thead>
                <tr class="text-center table-primary">
                    <th>Id</th>
                    <th>Clasificación</th>
                    <th nowrap>(turno) Hora</th>
                    <th>Solicitante</th>
                    <th>Información telefonica</th>
                    <th>Dirección</th>
                    <th>Teléfono</th>
                    <th>Receptor de llamada</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($shift->calls->where('classification','OT')->sortByDesc('id') as $call)
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
                    </td>
                    <td>({{ $shift->id}}) {{ $call->hour}}</td>
                    <td>{{ $call->applicant }}</td>
                    <td>{{ $call->information }}</td>
                    
                    <td>{{ $call->address }}</td>
                    <td>{{ $call->telephone }}</td>
                    <td>{{ $call->receptor->officialFullName }}</td>
                    <td class="text-center" >
                        @if($shift->status == true)
                        <form method="POST" action="{{ route('samu.call.destroy' , $call) }}">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                        @endif
                    </td>

                </tr>
                @endforeach   
            </tbody>
        </table>
    </div>
    <!-- fin de registro de llamadas-->
    @endunless
@endforeach


@endsection

@section('custom_js')

@endsection
