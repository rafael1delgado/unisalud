@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-car-crash"></i> Nuevo cometido {{ $nextCounter }}</h3>
      
<form method="post" action="{{ route('samu.event.store') }}">

    <h4 class="mb-3">Asociar cometido a una llamada</h4>

    <div class="form-row">
        <fieldset class="form-group col-md-12">
            <label for="for_calls">Ultimas 20 llamadas clasificadas*</label>
            <select class="form-control" name="call" id="call" required>
                <option> </option>
                @foreach($calls as $call)
                    <option value="{{ $call->id }}">
                    @if($call->events->isNotEmpty())
                     &nbsp;
                    @endif
                        <b>ID: {{ $call->id }}</b> - 
                        COM: 
                        @if($call->events->isNotEmpty())
                            {{ implode(',', $call->events->pluck('id')->toArray() )}}
                        @endif -
                        CLAS: {{ $call->classification }} - 
                        DIR: {{ $call->address }} -
                        ( {{ $call->information }} )
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
        'shift' => $shift
    ])

    <button type="submit" class="btn btn-primary" >Guardar</button>

    <a href="{{ route('samu.event.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>

<br>

@endsection

@section('custom_js')

@endsection