@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-blender-phone"></i> Listado de Turnos {{ $openShift }}
    @if($openShift)
    <button class="btn btn-outline-success float-right" disabled readonly>
        <i class="fas fa-plus"></i> Hay un turno abierto
    </button>
    @else
    <a class="btn btn-success float-right" href="{{ route('samu.shift.create') }}">
        <i class="fas fa-plus"></i> Crear turno
    </a>
    @endif
</h3>

<div class="table-responsive">
    <table class="table table-striped">
        
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>Estado</th>
                <th>Turno</th>
                <th>Apertura</th>
                <th>Cierre</th>
                <th>Personal</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($shifts as $shift)
            <tr>
                <td>
                    <a href="{{ route('samu.shift.edit', $shift) }}">
                        <button class="btn btn-outline-primary"><i class="fas fa-edit"></i> {{ $shift->id }}</button>
                    </a>
                </td>
                <td>{{ $shift->statusInWord }} </td>
                <td>{{ $shift->type }}</td>
                <td>{{ $shift->opening_at->format('Y-m-d H:i') }}</td>
                <td>{{ optional($shift->closing_at)->format('Y-m-d H:i') }}</td>
                <td>
                    @if($shift->status == true)
                        @livewire('samu.shift-user', ['shift' => $shift])
                    @else
                        @foreach($shift->users as $user)
                        <div class="form-row m-1">
                            <div class="col-6">
                                <li>
                                    {{ optional($user)->officialFullName }}
                                </li>
                            </div>
                            <div class="col-5">
                                {{ optional($user->pivot)->JobType->name }}
                            </div>
                            <div class="col-1">
                                
                            </div>
                        </div>
                        @endforeach
                    @endif
                </td>
                <td>
                    @if($shift->status == true)
                    <form method="POST" action="{{ route('samu.shift.destroy', $shift) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
        
    </table>
</div>

{{ $shifts->links() }}

@endsection

@section('custom_js')

@endsection