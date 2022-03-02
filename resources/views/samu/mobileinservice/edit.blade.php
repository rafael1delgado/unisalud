@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-ambulance"></i> Editar móvil en truno</h3>

<form method="POST" action="{{ route('samu.mobileinservice.update', $mobileInService) }}">
    @csrf
    @method('PUT')
    
    <div class="form-row">

        <fieldset class="form-group col-8 col-md-1">
            <label for="for_position">Posición </label>
            <input type="number" value="{{ $mobileInService->position }}" class="form-control" name="position">             
        </fieldset>

        <fieldset class="form-group col-8 col-md-2">
            <label for="for_mobile_id">Móvil </label>
            <select class="form-control" name="mobile_id">
                @foreach($mobiles as $mobile)
                    <option value="{{ $mobile->id }}" {{ $mobileInService->mobile_id === $mobile->id ? 'selected' : '' }}>{{ $mobile->code }} - {{ $mobile->name }} </option>
                @endforeach
            </select>
            
        </fieldset>

        <fieldset class="form-group col-12 col-md-1">
            <label for="empresa">Tipo de  móvil</label>
            <select class="form-control" name="type">
                <option value="M1" {{ $mobileInService->type === 'M1' ? 'selected' : '' }}>M1</option>
                <option value="M2" {{ $mobileInService->type ==='M2' ? 'selected' : ''}}>M2</option>
                <option value="M3" {{ $mobileInService->type ==='M3' ? 'selected' : ''}}>M3</option>
                <option value="Hibrido" {{ $mobileInService->type ==='Hibrido' ? 'selected': ''}}>Hibrido</option>
                <option value="RU1" {{ $mobileInService->type === 'RU1' ? 'selected' : ''}}>RU1</option>
                <option value="RU2" {{ $mobileInService->type ==='RU2' ? 'selected' :''}}>RU2 </option>
            </select>
        </fieldset>

        
        <fieldset class="form-group col-8 col-md-3">
            <label for="for_o2">Oxígeno Central</label>
            <input type="text" class="form-control" name="o2" value="{{ $mobileInService->o2 }}">             
        </fieldset>
        
        <div class="mt-5 form-check col-md-1">
            <input type="checkbox" class="form-check-input ml-3" name="status" {{ ($mobileInService->status) ? 'checked':''}} >
            <label class="form-check-label ml-5" for="exampleCheck1">Activo</label>
        </div>
    </div>
    <div class="form-row">
        
        <fieldset class="form-group col-12 col-md-8">
            <label for="observation">Observación</label>
            <textarea class="form-control" id="observation" name="observation">{{ $mobileInService->observation }}</textarea>
        </fieldset>

    </div>

    <button type="submit" class="btn btn-primary button" >Guardar</button>
    <a href="{{ route('samu.mobileinservice.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>

@can('Developer')
    <a class="btn btn-info mt-4" href=" {{ route('samu.mobileinservice.location', $mobileInService) }}">
        <i class="fas fa-map-marked"></i> Ubicación
    </a>
@endcan

@endsection

@section('custom_js')

@endsection