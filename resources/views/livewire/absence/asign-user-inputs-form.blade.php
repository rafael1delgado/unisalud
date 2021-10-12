<div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="inputrut">RUT</label>
            <input type="number" class="form-control @error('user') is-invalid @enderror" placeholder="Ingrese el rut" wire:model.lazy="run" name="run"
                   wire:change="searchUser()">
            @error('user') <div class="invalid-feedback">{{ $message }}</div>@enderror
            <input type="hidden" name="user_id" wire:model="user_id">
        </div>
        <div class="form-group col-md-1">
            <label for="inputdv">Dv</label>
            <input type="text" class="form-control" placeholder="Dv" wire:model="dv" name="dv" readonly>
        </div>
        <div class="form-group col-md-1">
            <label for="inputEmail4">&nbsp;</label>
            <button type="button" class="btn btn-primary form-control" data-toggle="modal"
                    data-target="#searchUserModal" title="Búsqueda avanzada" ><i class="fa fa-search" aria-hidden="true"></i>
            </button>
        </div>
    </div>

    <div class="row">
        <div class="form-group col-md-3">
            <label for="inputrut">Nombre</label>
            <input type="text" class="form-control" wire:model="name" readonly>

        </div>
        <div class="form-group col-md-2">
            <label for="inputdv">Apellido paterno</label>
            <input type="text" class="form-control" wire:model="fathers_family" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="inputdv">Apellido materno</label>
            <input type="text" class="form-control" wire:model="mothers_family" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="inputdv">Género</label>
            <input type="text" class="form-control" wire:model="sex" readonly>
        </div>
        <div class="form-group col-md-1">
            <label for="inputdv">Edad(años)</label>
            <input type="text" class="form-control" wire:model="age" readonly>
        </div>
        <div class="form-group col-md-2">
            <label for="inputdv">Edad (meses)</label>
            <input type="text" class="form-control w-50" wire:model="months" readonly>
        </div>
    </div>

    <div class="row">
        <fieldset class="form-group col-md-3">
            <label for="for_service">Unidad</label>
            <select wire:model="contract_id" name="contract_id" id="for_service" class="form-control" required>
              <!-- <option value="">--</option> -->
                @foreach($contracts as $contract)
                <option value="{{$contract->id}}">{{$contract->service->service_name}}</option>
                @endforeach
            </select>
        </fieldset>

        <div class="form-group col-md-2">
            <label for="for_contract_law">Ley según contrato vigente</label>
            <input type="text" class="form-control" wire:model="law" readonly>
        </div>

        <fieldset class="form-group col-4">
            <label for="for_organization_id">Establecimiento</label>
            <select name="organization_id" wire:model="organization_id" id="for_organization_id" class="form-control" required>
            <!-- <option value="">--</option> -->
              @foreach($organizations as $organization)
                <option value="{{$organization->id}}">{{$organization->name}}</option>
              @endforeach
            </select>
        </fieldset>

        <fieldset class="form-group col-md-3">
            <label for="for_job_title">Cargo</label>
            <select wire:model.defer="practitioner_id" name="practitioner_id" id="for_job_title" class="form-control" required>
              <!-- <option value="">--</option> -->
                @foreach($practitioners as $practitioner)
                <option value="{{$practitioner->id}}">{{$practitioner->job_title}}</option>
                @endforeach
            </select>
        </fieldset>
    </div>

    <div class="row">
        <fieldset class="form-group col-md-3">
            <label for="for_contract_type">Tipo de contrato</label>
            <select name="contract_type" id="for_contract_type" class="form-control">
              <!-- <option value="">--</option> -->
              <option value="Titulares y Contratados">Titulares y Contratados</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-md-3">
            <label for="for_social_insurance">AFP</label>
            <select name="social_insurance" id="for_social_insurance" class="form-control">
              <option value="">--</option>
              <option value="CUPRUM">CUPRUM</option>
              <option value="HABITAT">HABITAT</option>
              <option value="PROVIDA">PROVIDA</option>
              <option value="PLANVITAL">PLANVITAL</option>
              <option value="CAPITAL">CAPITAL</option>
              <option value="MODELO">MODELO</option>
              <option value="UNO">UNO</option>
              <option value="CANAEMPU %18.62">CANAEMPU %18.62</option>
              <option value="CANAEMPU %14.20">CANAEMPU %14.20</option>
            </select>
        </fieldset>

        <fieldset class="form-group col-md-3">
            <label for="for_health_insurance">Salud</label>
            <select name="health_insurance" id="for_health_insurance" class="form-control">
              <option value="">--</option>
              <option value="BANMEDICA S.A.">BANMEDICA S.A.</option>
              <option value="COLMENA GOLDEN">COLMENA GOLDEN</option>
              <option value="CONSALUD S.A.">CONSALUD S.A.</option>
              <option value="CRUZ BLANCA">CRUZ BLANCA</option>
              <option value="FONASA">FONASA</option>
              <option value="MAS VIDA S.A.">MAS VIDA S.A.</option>
              <option value="Nueva MasVida">Nueva MasVida</option>
              <option value="VIDA TRES S.A.">VIDA TRES S.A.</option>
            </select>
        </fieldset>
    </div>

    @livewire('some.search-user-modal')
</div>
