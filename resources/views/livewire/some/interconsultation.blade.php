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
            <label for="for_state">Estado</label>
            <select id="state" name="for_state" class="form-control" wire:model.lazy="state">
                <option></option>
                <option value='pendiente'>Pendiente</option>
                <option value='priorizadas'>Priorizadas</option>
                <option value='citadas'>Citadas</option>
                <option value='observadas'>Observadas</option>
                <option value='rechazadas'>Rechazadas</option>

            </select>
        </div>  
        <button type="submit" class="btn btn-primary">Buscar</button>
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
                <th scope="col">Fecha</th>
                <th scope="col">Paciente</th>
                <th scope="col">Esepcialidad</th>
                <th scope="col">Egresado</th>
                <th scope="col">Origen</th>
                <th scope="col">Ficha</th>
                <th scope="col">RUN</th>
                <th scope="col">Paciente</th>
                <th scope="col">Edad</th>
                <th scope="col">Contacto</th>
                <th scope="col">Pertinencia</th>
                <th scope="col">Recibida</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    <!-- <table class="table table-sm table-hover">
            <thead class="table-info">
            <tr>
                <th scope="col">Interconsulta</th>
                <th scope="col">Solicitud</th>
            </tr>
            </thead>
        </table>
    </div> -->

        

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

