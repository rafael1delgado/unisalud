<form method="POST" action="{{ route('samu.noveltie.store') }}">
    @csrf
    @method('POST')

    <div class="form-row">

        <fieldset class="form-group col">
            <label for="for_detail">Novedades turno {{ optional($openShift)->opening_at }}</label>
            <textarea class="form-control" rows="8" name="detail" required>{{ old('detail') }}</textarea>
        </fieldset>

    </div>
    
    <button type="submit" class="btn btn-primary" >Guardar</button>

    <a href="{{ route('samu.noveltie.index') }}" class="btn btn-outline-secondary">Cancelar</a>

</form>