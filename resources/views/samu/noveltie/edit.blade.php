@extends('layouts.app')

@section('content')

@include('samu.nav')

<h3 class="mb-3"><i class="fas fa-book"></i> Editar novedades</h3>

<form method="post" action="{{ route('samu.noveltie.update', $noveltie) }}">
    @csrf
    @method('PUT')

    <div class="form-row">

        <fieldset class="form-group col">
            <label for="for_detail">Detalles </label>
            <textarea class="form-control" rows="8" name="detail" required >{{ old('detail', $noveltie->detail) }}</textarea>
        </fieldset>

    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ route('samu.noveltie.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>

@endsection
