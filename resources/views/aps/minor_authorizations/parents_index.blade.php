@extends('layouts.app')

@section('content')

<h2 class="mb-3">Mis autorizaciones</h2>

@foreach( $array as $key => $value)
    <div class="alert alert-secondary" role="alert">
        <b>{{ App\Models\Aps\AuthorizationType::find($key)->name }}</b>
        <a class="btn btn-xs" href="{{ route('aps.minor_authorizations.create',$key) }}">
            <i class="fas fa-plus"></i>
        </a>
    </div>

    <div class="table-responsive">

        <table class="table table-sm table-borderer table-responsive-xl" id="myTable">
            <thead>
                <tr>
                    <!-- <th>Tipo</th> -->
                    <th>F.Autorización</th>
                    <th>Rut alumno</th>
                    <th>Nombre alumno</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody>
                @foreach( $value as $key => $minorAuthorization)
                    @if (!$minorAuthorization->authorized)
                        <tr style="background-color:#D3F8F8">
                    @else
                        <tr>
                    @endif
                    <!-- <td>{{ $minorAuthorization->type->name }}</td> -->
                    <td>{{ $minorAuthorization->authorization_date->format('d-m-Y') }}</td>
                    
                    <td>{{ $minorAuthorization->run }}-{{ $minorAuthorization->dv }}</td>
                    <td>{{ $minorAuthorization->names }} {{ $minorAuthorization->fathers_family }} {{ $minorAuthorization->mothers_family }}</td>
                    <td>@if($minorAuthorization->authorized) Autorizado @else No autorizado @endif</td>
                </tr>
                @endforeach
            </tbody>
        </table>

    </div>
@endforeach



@endsection

@section('custom_js')

<script>

</script>

@endsection