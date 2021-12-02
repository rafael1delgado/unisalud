@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de QTCs de hoy
    <a class="btn btn-success float-right" href="{{ route('samu.qtc.create') }}">
        <i class="fas fa-plus"></i> Crear QTC
    </a>
</h3>

<div class="table-responsive">
    <table class="table table-striped">
        
        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>QTC N°</th>
                <th>Turno</th>
                <th>Clave</th>
                <th>Clave de Retorno</th>
                <th>Movil en Servicio</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($qtcs_today as $qtc)
            <tr class="table-{{ $qtc->color }}">
                <td>
                    <a href="{{ route('samu.qtc.edit', $qtc) }}">
                        <button class="btn btn-outline-primary"><i class="fas fa-edit"></i> {{ $qtc->id }}</button>
                    </a>
                </td>
                <td>{{ $qtc->counter }} </td>
                <td>{{ $qtc->shift->opening_at }}</td>
                <td>{{ $qtc->key->key }} - {{ $qtc->key->name }} </td>
                <td>{{ optional($qtc->returnKey)->key }} - {{ optional($qtc->returnKey)->name }}</td>
                <td>{{ optional(optional($qtc->mobileInService)->mobile)->code }} {{ optional(optional($qtc->mobileInService)->mobile)->name }}</td>
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


<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de QTCs de ayer</h3>

<div class="table-responsive">
    <table class="table table-striped">
        
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>QTC N°</th>
                <th>Turno</th>
                <th>Clave</th>
                <th>Clave de Retorno</th>
                <th>Movil en Servicio</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($qtcs_yesterday as $qtc)
            <tr class="table-{{ $qtc->color }}">
                <td>
                    <a href="{{ route('samu.qtc.edit', $qtc) }}">
                        <button class="btn btn-outline-primary"><i class="fas fa-edit"></i> {{ $qtc->id }}</button>
                    </a>
                </td>
                <td>{{ $qtc->counter }} </td>
                <td>{{ $qtc->shift->opening_at }}</td>
                <td>{{ $qtc->key->key }} - {{ $qtc->key->name }} </td>
                <td>{{ optional($qtc->returnKey)->key }} - {{ optional($qtc->returnKey)->name }}</td>
                <td>{{ optional(optional($qtc->mobileInService)->mobile)->code }} {{ optional(optional($qtc->mobileInService)->mobile)->name }}</td>
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