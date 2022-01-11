@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Listado de Moviles - Tripulación
    <a class="btn btn-success float-right" href="{{ route('samu.mobileinservice.create') }}">
        <i class="fas fa-plus"></i> </i> Agregar Moviles en turno
    </a>
</h3>

<div class="table-responsive">
    <table class="table">
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>Turno</th>
                <th>Movil</th>
                <th>Tipo</th>
                <th>Tripulación</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($mobilesInService as $mis)
            <tr>
                <td>
                @if($mis->shift->status == true)
                    <a href="{{ route('samu.mobileinservice.edit',$mis) }}">
                        <button class="btn btn-outline-primary"><i class="fas fa-edit"></i></button>
                    </a>
                @endif
                </td>
                <td>
                    {{ $mis->shift->id }} -
                    {{ $mis->shift->opening_at->format('Y-m-d') }} - 
                    {{ $mis->shift->type }} <br> ({{ $mis->shift->statusInWord }})
                </td>
                <td>{{ $mis->mobile->code }} {{ $mis->mobile->name }}</td>
                <td>{{ $mis->type}} </td>
                <td>
                    @if($mis->shift->status == true)
                        @livewire('samu.mobile-crew',['mobileInService' => $mis])
                    @else
                        @foreach($mis->crew as $tripulant)
                        <div class="form-row m-1">
                            <div class="col-5">
                                <li>
                                    {{ $tripulant->officialFullName }}
                                </li>
                            </div>
                            <div class="col-2">
                                {{ $tripulant->pivot->jobType->name }}
                            </div>
                            <div class="col-3">
                                {{ $tripulant->pivot->assumes_at }}
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($mis->shift->status == true)
                    <form method="POST" action="{{ route('samu.mobileinservice.destroy' , $mis) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="6">Observación: {{ $mis->observation}} </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
        
{{ $mobilesInService->links() }}

@endsection

@section('custom_js')

@endsection
