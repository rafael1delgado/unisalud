<form method="POST" action="{{ route('samu.noveltie.store') }}">
    @csrf
    @method('POST')

    <div class="form-row">

        <fieldset class="form-group col">
            <label for="for_detail">Detalles </label>
            <textarea class="form-control" rows="8" name="detail" required></textarea>
        </fieldset>

    </div>
    
    <button type="submit" class="btn btn-primary" >Guardar</button>

    <a href="{{ route('samu.noveltie.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>