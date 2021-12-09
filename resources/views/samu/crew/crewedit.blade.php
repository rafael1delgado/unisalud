@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3">Editar Fecha</h3>
<form method="POST" class="form-horizontal" action="{{ route('samu.mobileinservice.crewupdate', $mobileCrew) }}">
    @csrf
    @method('PUT')
    <div class="form-row">
            <fieldset class="col-md-6 col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="for_assumes_at">Asume:</span>
                    </div>
                    <input type="datetime-local" class="form-control" name="assumes_at" value="{{ $mobileCrew->assumes_at->format('Y-m-d\TH:i:s') }}" >
                </div>
            </fieldset>
            <fieldset class="col-md-6 col-6">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="for_assumes_at">Se retira:</span>
                    </div>
                    <input type="datetime-local" class="form-control" name="leaves_at"  value="{{ optional($mobileCrew->leaves_at)->format('Y-m-d\TH:i:s') }}">
                </div>
            </fieldset>

    </div>       
    <div class="form-row">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>






@endsection


@section('custom_js')
<script>

$("document").ready(function(){
    setTimeout(function(){
       $("div.alert").remove();
    }, 3000 ); // 3 secs

});
</script>
@endsection