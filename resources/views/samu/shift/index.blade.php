@extends('layouts.app')

@section('content')

@include('nav')


<div class="mb-3" style="font-size: 1.575rem;">
    <i class="fas fa-clipboard-list"></i>
    <span>Listado de Turnos</span>
    <a class="btn btn-success " href="{{ route('samu.shift.create') }}">
        <i class="fas fa-plus"></i> Crear turno
    </a>
</div>
<div class="card mb-3">
    <div class="card-body">
        <div class="form-row">        
            <div class="table-responsive col-md-12">
                <table class="table table-sm table-bordered table-striped small">
                    <thead>
                    @foreach($shifts as $shift)
                        <tr class="text-center table-info">
                            <th>FECHA</th>
                            <th>TURNO</th>
                            <th>APERTURA TURNO</th>
                            <th>CIERRE TURNO</th>
                            <th>EDITAR</th>
                        </tr>
                    </thead>
                    <tbody>
                       
                        <tr>
                            
              
                            <td class="text-center">{{ $shift->date }}</td>
                            <td class="text-center">{{ $shift->type }}</td>
                            <td class="text-center">{{ $shift->opening_time }}</td>
                            <td class="text-center">{{ $shift->closing_time }}</td>
                            
                           
                            <td class="d-flex align-items-center justify-content-center">
                                <a href="{{ route('samu.shift.edit', $shift) }}">
                                    <button class="btn btn-sm btn-warning"><i class="fas fa-edit"></i></button>
                                </a>
                                <form method="POST" action="{{ route('samu.shift.destroy' , $shift) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button " class="btn btn-sm btn-danger mx-1"><i class="fas fa-trash-alt"></i></button>
                                </form>
                            </td>
                        </tr>
        
                        <tr>
                            <td colspan="5">
                                @livewire('samu.shift-user', ['shift_id' => $shift->id])
                            </td>
                        </tr>
                        @endforeach
                        
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
    </div>
</div>
<div>
{{ $shifts->links('pagination::bootstrap-4') }}
</div>
</div>

@endsection
@section('custom_js')
<script>
$(function () {
        $('[data-toggle="popover" ]').popover()
    })
</script>
@endsection