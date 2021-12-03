@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-car-crash"></i> Editar Qtc {{ $qtc->id }}</h3>

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

<h3>Llamadas relacionadas a este QTC</h3>

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
            @foreach($qtc->calls as $call)
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
    @include('partials.short_audit', ['audits' => $qtc->audits] )
</div>
@endcanany

<br>

@endsection

@section('custom_js')

@endsection