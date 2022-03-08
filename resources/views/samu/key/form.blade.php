<div class="form-row">

    <fieldset class="form-group col-8 col-md-1">
        <label for="for_key">Código *</label> 
        <input type="text" class="form-control" id="for_key" name="key" 
            value="{{ ($key && $key->key) ? $key->key : '' }}" autocomplete="off" required>
    </fieldset>

    <fieldset class="form-group col-8 col-md-4">
        <label for="for_name">Nombre *</label>
        <input type="text" class="form-control" id="for_name" name="name" 
            value="{{ ($key && $key->name) ? $key->name : '' }}" autocomplete="off" required>
    </fieldset>

</div>