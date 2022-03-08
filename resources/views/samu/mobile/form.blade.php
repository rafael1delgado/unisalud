<div class="form-row">

    <fieldset class="form-group col-8 col-md-1">
        <label for="for_mobile_code">Código *</label>
        <input type="text" class="form-control" id="for_mobile_code" name="code" 
            value="{{ ( $mobile &&  $mobile->code) ? $mobile->code : '' }}" required>
    </fieldset>

    <fieldset class="form-group col-8 col-md-3">
        <label for="for_name_mobile_code">Nombre *</label>
        <input type="text" class="form-control" id="for_name_mobile_code" name="name" 
            value="{{ ($mobile && $mobile->name) ? $mobile->name : '' }}" required>
    </fieldset>
    
    <fieldset class="form-group col-8 col-md-1">
        <label for="for_type">Tipo de móvil*</label>
        <select class="form-control" name="type" required>
            <option value=""></option>
            <option value="M1" {{ optional($mobile)->type === 'M1' ? 'selected' : '' }}>M1</option>
            <option value="M2" {{ optional($mobile)->type === 'M2' ? 'selected' : '' }}>M2</option>
            <option value="M3" {{ optional($mobile)->type === 'M3' ? 'selected' : '' }}>M3</option>
            <option value="Hibrido" {{ optional($mobile)->type === 'Hibrido' ? 'selected': '' }}>Hibrido</option>
            <option value="RU1" {{ optional($mobile)->type === 'RU1' ? 'selected' : '' }}>RU1</option>
            <option value="RU2" {{ optional($mobile)->type === 'RU2' ? 'selected' : '' }}>RU2 </option>
        </select>
    </fieldset>

    <fieldset class="form-group col-8 col-md-1">
        <label for="for_name_mobile_plate">Patente</label>
        <input type="text" class="form-control" id="for_name_mobile_plate" name="plate" 
            value="{{ ($mobile && $mobile->plate) ? $mobile->plate : '' }}">
    </fieldset>

    <fieldset class="form-group col-8 col-md-3">
        <label for="for_name_mobile_type">Descripción</label>
        <input type="text" class="form-control" id="for_name_mobile_description" name="description" 
            value="{{ ($mobile && $mobile->description) ? $mobile->description : '' }}">
    </fieldset>

    <div class="mt-5 form-check col-md-2">
        <input type="checkbox" class="form-check-input ml-3" name="managed" {{ ($mobile && $mobile->managed) ? 'checked':''}} >
        <label class="form-check-label ml-5" for="exampleCheck1">Móvil Pertenece a Samu</label>
    </div>

    <div class="mt-5 form-check col-md-1">
        <input type="checkbox" class="form-check-input ml-3" name="status" {{ ($mobile && $mobile->status) ? 'checked':''}} >
        <label class="form-check-label ml-5" for="exampleCheck1">Activo</label>
    </div>

</div>