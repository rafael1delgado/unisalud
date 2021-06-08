@extends('layouts.app')

@section('title', 'Licencia Medica')

@section('content')

<!--inicio-->

<form method="post" action="{{route('medical_licence.find-user')}}">
@csrf
    <div class="form-row">
        <div class="form-group col-md-5">
        <label for="for-run">RUT</label>
        <input type="number" class="form-control" name="run" id="run">
        </div>
        <div class="form-group col-md-3">
            <label for="">&nbsp;</label>
            <button type="submit" class="btn btn-primary form-control">Buscar</button>
        </div>
    </div>
</form>

@endsection

@section('custom_js')

@endsection
