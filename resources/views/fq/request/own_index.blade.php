@extends('layouts.app')

@section('title', 'FQ - Mis Solicitudes')

@section('content')

@include('fq.partials.nav')

<br>

<h5>Mis Solicitudes</h5>

<div class="table-responsive">
    <table class="table table-sm table-striped table-bordered">
        <thead class="text-center">
            <tr>
                <th style="width: 11%">Fecha</th>
                <th>Estado</th>
                <th>Motivo de Solicitud</th>
                <th>observación</th>
                <th style="width: 2%"></th>
            </tr>
        </thead>
        <tbody>
            @foreach($my_reqs as $fqRequest)
            <tr>
                <td>{{ $fqRequest->created_at->format('d-m-Y H:i:s') }}</td>
                <td>{{ $fqRequest->StatusValue }}</td>
                <td>{{ $fqRequest->NameValue }}</td>
                <td>{{ $fqRequest->observation_patient }}</td>
                <td>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-outline-secondary btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal-{{ $fqRequest->id }}">
                        <i class="fas fa-edit"></i>
                    </button>

                    @include('fq.request.modals.view_request')
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

@section('custom_js')

@endsection
