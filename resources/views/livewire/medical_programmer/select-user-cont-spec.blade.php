<div class="row">

  <fieldset class="form-group col col-md">
      <label for="">Trabajador</label>
      <div class="input-group">
          <input
              type="text"
              class="form-control"
              placeholder="Nombre"
              aria-label="Nombre"
          @if(!$user)
              wire:model="query"
              wire:keydown.escape="resetx"
          @else
              wire:model="selectedName"
              disabled readonly
          @endif
          />

          <div class="input-group-append">
              <a class="btn btn-outline-secondary" wire:click="resetx">
                  <i class="fas fa-eraser"></i> Limpiar</a>
          </div>
      </div>

      @if($user)
      <input type="hidden"  name="{{ $selected_id }}" value="{{ $user->id }}">
      @endif

      @if(!empty($query))
          <ul class="list-group">
              @if( count($users) >= 1 )
                  @foreach($users as $user)
                      <a wire:click="setUser({{$user->id}})"
                          class="list-group-item list-group-item-action"
                      >{{ $user->OfficialFullName }} </a>
                  @endforeach
              @elseif($msg_too_many)
                  <div class="list-group-item disabled">Hemos encontrado muchas coincidencias</div>
              @else
                  <div class="list-group-item disabled">No hay resultados</div>
              @endif
          </ul>
      @endif
  </fieldset>

  <fieldset class="form-group col col-md">
      <label for="">Contrato</label>
      <select class="form-control" name="contract_id"required>
        <option value=""></option>
        @if($contracts != null)
          @foreach($contracts as $contract)
            <option value="{{$contract->id}}">{{$contract->law}} - {{$contract->weekly_hours}}hrs - {{$contract->year}}</option>
          @endforeach
        @endif
      </select>
  </fieldset>

  <fieldset class="form-group col col-md">
      <label for="">Especialidad</label>
      <select class="form-control" name="specialty_id" required>
        <option value=""></option>
        @if($userSpecialties != null)
          @foreach($userSpecialties as $userSpecialty)
            <option value="{{$userSpecialty->specialty_id}}">{{$userSpecialty->specialty->specialty_name}}</option>
          @endforeach
        @endif
      </select>
  </fieldset>

</div>
