@extends('layouts.app')

@section('content')

@include('samu.nav')


<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de QTCs filtrados
</h3>

<form method="post" action="{{ route('samu.qtc.filter')}}">
    @csrf
    @method('POST')
    <div class="form-row">
            <fieldset class="form-group col-md-2">
                <label for="for_hour">Fecha</label>
                <input type="date" class="form-control form-control-sm" name="date" id="date" value="{{ old('date', isset($filter_date) ? $filter_date : null) }}"> 
            </fieldset>

            <div class="col-1 align-self-end ml-auto pb-3">
                <button type="submit" class="btn btn-primary btn-sm form-control  form-control-sm"> <i class="fas fa-filter"></i> Filtrar </button>
            </div>
    </div>
</form>

@if(isset($qtcs_filtered) && $qtcs_filtered != null && $qtcs_filtered->count() > 0)
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
                @foreach($qtcs_filtered as $qtc)
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
@endif

@if(isset($qtcs_filtered) && $qtcs_filtered != null && $qtcs_filtered->count() === 0)
    <div class="alert alert-warning">
        No hay eventos con esos parámetros
    </div>
@endif


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