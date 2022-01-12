@extends('layouts.app')

@section('content')

@include('samu.nav')

<div class="row">
    <div class="col-10">
        <table class="table table-sm">
            <tr>
                <th>Orden salida</th>
                <th>Móvil</th>
                <th>Tripulación</th>
                <th>Estado</th>
            </tr>
            @foreach($shift->mobilesInService->sortBy('position') as $mis)
                <tr>
                    <td>{{ $mis->position }}</td>
                    <td>{{ $mis->mobile->code }} {{ $mis->mobile->name }}</td>
                    <td>
                        @foreach($mis->crew as $tripulant)
                        {{ $tripulant->officialFullName }} <span class="badge bg-secondary text-white">{{ $tripulant->pivot->jobType->name }}</span>
                        @endforeach
                    </td>
                    <td></td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="col-2">
        <table class="table table-sm">
            <tr><th>Codificación colores</th></tr>
            <tr><td class="table-danger">Móvil aun no sale</td></tr>
            <tr><td class="table-warning">Móvil rumbo a destino</td></tr>
            <tr><td class="table-info">Móvil retornando a base</td></tr>
            <tr><td class="table-success">Móvil en base</td></tr>
        </table>
    </div>
</div>




<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de Eventos filtrados</h3>

<form method="post" action="{{ route('samu.event.filter')}}">
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

@if(isset($events_filtered) && $events_filtered != null && $events_filtered->count() > 0)
    <div class="table-responsive">
        <table class="table table-striped">
            
            <thead>
                <tr class="table-primary">
                    <th>ID</th>
                    <th>Evento N°</th>
                    <th>Turno</th>
                    <th>Clave</th>
                    <th>Clave de Retorno</th>
                    <th>Movil en Servicio</th>
                    <th></th>
                </tr>
            </thead>
            
            <tbody>
                @foreach($events_filtered as $event)
                <tr class="table-{{ $event->color }}">
                    <td>
                        <a href="{{ route('samu.event.edit', $event) }}">
                            <button class="btn btn-outline-primary"><i class="fas fa-edit"></i> {{ $event->id }}</button>
                        </a>
                    </td>
                    <td>{{ $event->counter }} </td>
                    <td>{{ $event->shift->opening_at }}</td>
                    <td>{{ $event->key->key }} - {{ $event->key->name }} </td>
                    <td>{{ optional($event->returnKey)->key }} - {{ optional($event->returnKey)->name }}</td>
                    <td>
                        {{ optional($event->mobile)->code }} 
                        {{ optional($event->mobile)->name }}
                    </td>
                    <td>
                        <form method="POST" action="{{ route('samu.event.destroy', $event) }}">
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

@if(isset($events_filtered) && $events_filtered != null && $events_filtered->count() === 0)
    <div class="alert alert-warning">
        No hay eventos con esos parámetros
    </div>
@endif


<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de Eventos de hoy
    <a class="btn btn-success float-right" href="{{ route('samu.event.create') }}">
        <i class="fas fa-plus"></i> Crear Evento
    </a>
</h3>

<div class="table-responsive">
    <table class="table table-striped">
        
        <thead>
            <tr class="table-primary">
                <th>ID</th>
                <th>Evento N°</th>
                <th>Turno</th>
                <th>Clave</th>
                <th>Clave de Retorno</th>
                <th>Movil en Servicio</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($events_today as $event)
            <tr class="table-{{ $event->color }}">
                <td>
                    <a href="{{ route('samu.event.edit', $event) }}">
                        <button class="btn btn-outline-primary"><i class="fas fa-edit"></i> {{ $event->id }}</button>
                    </a>
                </td>
                <td>{{ $event->counter }} </td>
                <td>{{ $event->shift->opening_at }}</td>
                <td>{{ $event->key->key }} - {{ $event->key->name }} </td>
                <td>{{ optional($event->returnKey)->key }} - {{ optional($event->returnKey)->name }}</td>
                <td>
                    {{ optional($event->mobile)->code }} 
                    {{ optional($event->mobile)->name }}
                </td>
                <td>
                    <form method="POST" action="{{ route('samu.event.destroy', $event) }}">
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


<h3 class="mb-3"><i class="fas fa-car-crash"></i> Listado de Eventos de ayer</h3>

<div class="table-responsive">
    <table class="table table-striped">
        
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>Evento N°</th>
                <th>Turno</th>
                <th>Clave</th>
                <th>Clave de Retorno</th>
                <th>Movil en Servicio</th>
                <th></th>
            </tr>
        </thead>
        
        <tbody>
            @foreach($events_yesterday as $event)
            <tr class="table-{{ $event->color }}">
                <td>
                    <a href="{{ route('samu.event.edit', $event) }}">
                        <button class="btn btn-outline-primary"><i class="fas fa-edit"></i> {{ $event->id }}</button>
                    </a>
                </td>
                <td>{{ $event->counter }} </td>
                <td>{{ $event->shift->opening_at }}</td>
                <td>{{ $event->key->key }} - {{ $event->key->name }} </td>
                <td>{{ optional($event->returnKey)->key }} - {{ optional($event->returnKey)->name }}</td>
                <td>{{ optional(optional($event->mobileInService)->mobile)->code }} {{ optional(optional($event->mobileInService)->mobile)->name }}</td>
                <td>
                    <form method="POST" action="{{ route('samu.event.destroy', $event) }}">
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