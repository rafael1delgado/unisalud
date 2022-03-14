@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3">
    <i class="fas fa-car-crash"></i> Nuevo cometido {{ $nextCounter }}
    @if($call->id)
        - Relacionada con la llamada ID: {{ $call->id }}
    @endif
</h3>
      
<form method="post" action="{{ route('samu.event.store') }}">

    <h4 class="mb-3">Asociar cometido a una llamada</h4>

    <div class="form-row">
        <fieldset class="form-group col-md-12">
            <label for="for-call">Ultimas 20 llamadas clasificadas*</label>
            <select class="form-control" name="call_id" id="for-call" required>
                <option value="">Selecciona una llamada</option>
                @foreach($calls as $callItem)
                    <option value="{{ $callItem->id }}" {{ old('call_id', optional($call)->id) == $callItem->id ? 'selected' : '' }}>
                    @if($call->events->isNotEmpty())
                     &nbsp;
                    @endif
                        <b>ID: {{ $callItem->id }}</b>
                        @if($call->events->isNotEmpty())
                            - COM: 
                            {{ implode(',', $callItem->events->pluck('id')->toArray() )}}
                        @endif
                        - CLAS: {{ $callItem->classification }} 
                        - DIR: {{ $callItem->address }} 
                        ( {{ $callItem->information }} )
                    </option>
                @endforeach
            </select>
        </fieldset>
    </div>

    @csrf
    @method('POST')

    @include('samu.event.form', [
        'event' => null,
        'keys'  => $keys,
        'shift' => $shift,
        'call'  => $call
    ])

    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ route('samu.event.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>

<br>

@endsection

@section('custom_js')

@endsection