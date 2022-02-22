@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-book"></i> Registro de novedades</h3>

@if($shift OR old('detail'))
    @include('samu.noveltie.create')
@endif
          
<div class="table-responsive mt-3">
    <table class="table table-striped">
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>Turno</th>
                <th>Fecha registro</th>
                <th>Detalle de Novedades</th>
                <th>Creador</th>
            </tr>
        </thead>
        <tbody>
            @foreach($novelties as $noveltie)
            <tr>
                <td>
                    @if($noveltie->shift->status)
                    <a class="btn btn-sm btn-outline-primary" href="{{ route('samu.noveltie.edit', $noveltie) }}">
                    <i class="fas fa-edit"></i> {{ $noveltie->id }} </a>
                    @endif
                </td>
                <td>
                    {{ $noveltie->shift->opening_at }}
                    {{ $noveltie->shift->type }} ({{ $noveltie->shift->statusInWord }})
                </td>
                <td>{{ $noveltie->created_at }}</td>
                <td>{{ $noveltie->detail ?? ''}} </td>
                <td>{{ $noveltie->creator->officialFullName }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

{{ $novelties->links() }}

@endsection

@section('custom_js')

@endsection
