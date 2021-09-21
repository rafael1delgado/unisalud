<h3 class="mb-3">Interconsultas Externas</h3>

<div class="form-row">
    <div class="form-group col-md-4">
    <label for="for_specialty_id">Especialidad</label>
    @if($specialties != null)
      <select name="specialty_id" id="for_specialty_id" class="form-control" wire:model.lazy="specialty_id">
        <option></option>
        @foreach ($specialties as $specialty)
        <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
        @endforeach
      </select>
      @endif
      </div>

      <div class="form-group col-md-2">
            <label for="inputEmail4">Desde</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha inicio"
                   wire:model.lazy="appointments_from">
      </div>

        <div class="form-group col-md-2">
            <label for="inputEmail4">Hasta</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha fin"
                   wire:model.lazy="appointments_to">
        </div>  
        <div class="form-group col-md-2">
            <label for="for_type">Estado</label>
            <select id="for_type" name="type" class="form-control" wire:model.lazy="type" required
                    wire:change="getPractitioners()">
                <option></option>
                <option>Pendiente</option>
                <option>Priorizadas</option>
                <option>Citadas</option>
                <option>Observadas</option>
                <option>Rechazadas</option>

            </select>
        </div>  
</div>    

    <div class="table-responsive">
        <table class="table table-sm table-hover">
            <thead class="table-info">
            <tr>
                <th scope="col">Interconsulta</th>
                <th scope="col">Solicitud</th>
                <th scope="col">Prioridad</th>
                <th scope="col">Actividad</th>
                <th scope="col">Tipo</th>
                <th scope="col">Urgencia</th>
                <th scope="col">Cupo</th>
                <th scope="col">Sobre Cupo</th>
                <th scope="col">Estado</th>
            </tr>
            </thead>
        </table>
    </div>

<!-- 
        <fieldset class="form-group col">
            <label for="for_name">Nombre Locación</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="name" required>
        </fieldset>           

        <fieldset class="form-group col">
            <label for="for_alias">Alias</label>
            <input type="text" class="form-control" id="for_description" placeholder="" name="alias" required>
        </fieldset>           
    </div>

    -->

