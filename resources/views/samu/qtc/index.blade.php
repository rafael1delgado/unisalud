@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de QTCs
    <a class="btn btn-success float-right" href="{{ route('samu.qtc.create') }}">
        <i class="fas fa-plus"></i> Crear QTC
    </a>
</h3>

<div class="table-responsive">
    <table class="table table-striped">
        
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>Turno</th>
                <th>QTC N °</th>
                <th>Clave</th>
                <th>Clave de Retorno</th>
                <th>Movil en Servicio</th>
                <th>Detalle</th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($shift->qtcs as $qtc)
            <tr>
                <td>
                    <a href="{{ route('samu.qtc.edit', $qtc) }}">
                        <button class="btn btn-outline-primary"><i class="fas fa-edit"></i></button>
                    </a>
                </td>
                <td>{{ $qtc->shift['type'] }} - {{ $qtc->shift['opening_at'] }} </td>
                <td>{{ $qtc->id }} </td>
                <td>{{ $qtc->key_id['key'] }} -{{ $qtc->key_id['name'] }} </td>
                <td>{{ $qtc->return_key_id['key'] }} -{{ $qtc->return_key_id['name'] }} </td>
                <td>{{ $qtc->mobileinservice['name'] }} </td>
                <td>
                    <form method="POST" action="{{ route('samu.qtc.destroy', $qtc) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                </td>
              
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

@endsection

@section('custom_js')

@endsection