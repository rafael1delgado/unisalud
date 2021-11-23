<h3 class="text-primary"><b> Orientación Telefónica</b></h3>

<form method="post" action="{{ route('samu.ot.update', $call->ot) }}">
    @csrf
    @method('PUT')
    <div class="form-row">
        <div class=" col-md-12">
            <label for="for_run">Detalle de Orientacion Telefonica</label>
            <textarea class="form-control" name="description"  required>{{ optional($call)->ot->description }}</textarea>
            <div class="invalid-feedback">
                Ingrese descripción
            </div>
        </div>
        
    </div>
    <div class="form-row">
        <fieldset class="form-group col-md-2 mt-3">
            <label for="for_save"></label>
            <button type="submit" class="btn btn-primary button mb-3" >Guardar</button>
        </fieldset>
    </div>
</form>
<!-- fin detalle OT-->
