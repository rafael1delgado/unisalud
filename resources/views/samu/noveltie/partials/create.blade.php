<form method="POST" action="{{ route('samu.noveltie.store') }}">
    @csrf
    @method('POST')

    @include('samu.noveltie.partials.form', [
        'noveltie' => null
    ])
    
    <button type="submit" class="btn btn-primary" >Guardar</button>

    <a href="{{ route('samu.noveltie.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>