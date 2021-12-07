@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-headset"></i> Nueva de Llamada
    <small class="float-right"><i class="far fa-calendar-alt"></i> Fecha de registro: {{ date('Y-m-d') }}</small>
</h3>

@if($openShift)
    <!-- Create--> 
    <form method="POST" action="{{ route('samu.call.store') }}">
        @csrf
        @method('POST')

        @include('samu.call.form', ['call' => null])
    </form>

@else
    <div class="alert alert-warning" role="alert">
        No hay un turno abierto
    </div>
@endif

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
                @foreach($shift->calls as $call)
                <tr>
                    <td class="text-center">
                        <a href="{{ route('samu.call.edit',$call) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i> {{ $call->id }}
                        </a>
                    </td>
                    <td>
                        {{ $call->classification }} 
                        @if($call->classification != 'OT')
                            - Qtc: 
                            @foreach($call->qtcs as $qtc)
                                <a href="{{ route('samu.qtc.edit', $qtc) }}" class="link-primary"> {{ $qtc->id }}</a>, 
                            @endforeach
                        @endif
                    </td>
                    <td>({{ $call->shift->id}}) {{ $call->hour}}</td>
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
