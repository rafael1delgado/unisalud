@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-car-crash"></i> Editar Evento {{ $event->id }}</h3>

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

<h3>Llamadas relacionadas a este Evento</h3>

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
                <td>({{ $call->shift->id}}) {{ $call->hour}}</td>
                <td>{{ $call->applicant }}</td>
                <td>{{ $call->information }}</td>
                
                <td>{{ $call->address }}</td>
                <td>{{ $call->telephone }}</td>
                <td>{{ $call->receptor->officialFullName }}</td>
                <td class="text-center" >

                    <form method="POST" action="{{ route('samu.call.destroy' , $call) }}">
                        @csrf
                        @method('DELETE')
                        <button type="button" class="btn btn-sm btn-danger">
                            <i class="fas fa-trash"></i>
                        </button>
                    </form>

                </td>

            </tr>
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