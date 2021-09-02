
<h3 class="mb-3">Interconsultas Externas</h3>

    <div class="row">
    <fieldset class="form-group col">
        <label for="for_status">Especialidad</label>
             <select id="for_status" name="status" class="form-control" required>   </select> 
    </fieldset>   
    <fieldset class="form-group col">
        <label for="for_status">Solicitud</label>
        <input type="date" class="form-control" id="for_status" wire:model.lazy="appointments_from">
    </fieldset>    
    
    <button type="submit" class="btn btn-primary">Filtrar</button>

    <div class="table-responsive">
    <table class="table table-sm table-hover">
            <thead class="table-info">
            <tr>
                <th scope="col">Pendientes</th>
                <th scope="col">Priorizadas</th>
                <th scope="col">Citadas</th>
                <th scope="col">Observadas</th>
                <th scope="col">Rechazadas</th>
            </tr>
            </thead>
        </table>
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

