<div>

    <div class="form-row">
        <div class="form-group col-md-2 col-12">
            <label for="telephone">Teléfono</label>
            <input type="text" 
                class="form-control" 
                name="telephone" 
                id="telephone" 
                aria-describedby="telephone" 
                value="{{ old('telephone', optional($noveltie)->telephone) }}">
        </div>
    </div>

    <div class="form-row">
        <fieldset class="form-group col-md-12 col-12">
            <label for="for_detail">Detalle</label>
            <textarea class="form-control" 
                rows="4" 
                name="detail" 
                required>{{ old('detail', optional($noveltie)->detail) }}</textarea>
        </fieldset>
    </div>

</div>