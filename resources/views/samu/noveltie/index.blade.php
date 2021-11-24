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
                <th>Estado</th>
                <th>Turno</th>
                <th>Fecha registro</th>
                <th>Creador</th>
                <th>Detalle de Novedades</th>
            </tr>
        </thead>
        <tbody>
            @foreach($novelties as $noveltie)
            <tr>
                <td>
                    @if($noveltie->shift->status == 1)
                    <a class="btn btn-outline-primary" href="{{ route('samu.noveltie.edit', $noveltie) }}">
                    <i class="fas fa-edit"></i></a>
                    @endif
                </td>
                <td>{{ $noveltie->shift->statusInWord }}</td>
                <td>{{ $noveltie->shift->opening_at->format('Y-m-d') }} {{ $noveltie->shift->type }}</td>
                <td>{{ $noveltie->created_at }}</td>
                <td>{{ $noveltie->creator->officialFullName }}</td>
                <td>{{ $noveltie->detail ?? ''}} </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

@section('custom_js')

@endsection
