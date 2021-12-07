<h3 class="text-primary"><b> Orientación Telefónica</b></h3>

<form method="post" action="{{ route('samu.ot.update', $call->ot) }}">
    @csrf
    @method('PUT')

    <div class="form-row">
        <div class=" col-md-12">
            <label for="for_description">Detalle de Orientación Telefonica</label>
            <textarea class="form-control" name="description" rows="8" required>{{ optional($call)->ot->description }}</textarea>
        </div>
        
    </div>
    <div class="form-row">
        <fieldset class="form-group col-md-2 mt-3">
            <label for="for_save"></label>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </fieldset>
    </div>
</form>
<!-- fin detalle OT-->
