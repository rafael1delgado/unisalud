@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Listado de Moviles - Tripulación
    <a class="btn btn-success float-right" href="{{ route('samu.mobileinservice.create') }}">
        <i class="fas fa-plus"></i> </i> Agregar Moviles en turno
    </a>
</h3>

<div class="table-responsive">
    <table class="table table-striped">
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>Turno</th>
                <th>Movil</th>
                <th>Tipo</th>
                <th>Observación</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($shifts as $shift)
                @foreach($shift->mobilesInService as $mis)
                <tr>
                    <td>
                        <a href="{{ route('samu.mobileinservice.edit',$mis) }}">
                            <button class="btn btn-outline-primary"><i class="fas fa-edit"></i></button>
                        </a>

                    </td>
                    <td>
                        {{ $shift->opening_at->format('Y-m-d') }} - {{ $shift->type }}
                    </td>
                    <td>{{ $mis->mobile_id }}</td>
                    <td>{{ $mis->type}} </td>
                    <td>{{ $mis->observation}} </td>
                    <td>
                    @livewire('samu.mobile-crew',['mobileInService' => $mis])  
                    </td>
                    <td>
                        <form method="POST" action="{{ route('samu.mobileinservice.destroy' , $mis) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            @endforeach 
        </tbody>
    </table>
        
</div>

@endsection

@section('custom_js')

@endsection
