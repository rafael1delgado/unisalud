@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row">
    <div class="col">
        <h3 class="mb-3"><i class="fas fa-phone-volume"></i> Centro de Llamadas</h3>
    </div>
    <div class="col text-right">
        <h4><i class="far fa-calendar-alt"></i> Fecha de registro: {{date('Y-m-d')}}</h4>
    </div>
</div>


<!-- Create--> 
<form method="POST" action="{{ route('samu.call.store', $shift) }}">
    @csrf
    @method('POST')

    @include('samu.call.form', ['call' => null])
</form>



<h3>Registro de llamadas</h3>

<div class="table-responsive">

    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr class="text-center table-primary">
                <th>Id</th>
                <th>Clase</th>
                <th>Hora</th>
                <th>Recepcion de llamada</th>
                <th>Información telefonica</th>
                <th>Solicitante</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($calls as $call)
            <tr>
                <td class="text-center">
                    <a href="{{ route('samu.call.edit',$call) }}" class="btn btn-sm btn-outline-primary">
                        <i class="fas fa-edit"></i> {{ $call->id }}
                    </a>
                </td>
                <td>{{ $call->class_call }}</td>
                <td>{{ $call->hour}}</td>
                <td>{{ $call->call_reception}}</td>
                <td>{{ $call->telephone_information }}</td>
                <td>{{ $call->applicant }}</td>
                <td>{{ $call->address }}</td>
                <td>{{ $call->telephone }}</td>
                           
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


@endsection

@section('custom_js')

@endsection
