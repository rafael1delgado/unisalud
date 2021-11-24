@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-book"></i> Registro de Novedades del turno</h3>

@if($shift)
    @include('samu.noveltie.create')
@endif
          
<div class="table-responsive mt-3">
    <table class="table table-striped">
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>Turno</th>
                <th>Hora de apertura Turno</th>
                <th>Hora de cierre de Turno</th>
                <th>Detalle de Novedades</th>

            </tr>
        </thead>
        <tbody>
            @foreach($novelties as $noveltie)
            <tr>
                <td>
                    <a class="btn btn-outline-primary" href="{{ route('samu.noveltie.edit', $noveltie) }}">
                    <i class="fas fa-edit"></i></a>
                </td>
                <td>{{ $noveltie->shift->type }}</td>
                <td>{{ $noveltie->shift->opening_at->format('Y-m-d H:i') }}</td>
                <td>{{ $noveltie->shift->closing_time }}</td>
                <td>{{ $noveltie->detail ?? ''}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('custom_js')

@endsection
