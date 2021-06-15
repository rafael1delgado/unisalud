<div class="form-row">

      <div class="form-group col-md-4">
          <label for="for_type">Tipo</label>
          <select id="for_type" name="type" class="form-control" wire:model.lazy="type" required>
              <option></option>
              <option>Médico</option>
              <option>No médico</option>
          </select>
      </div>

      <div class="form-group col-md-4">
        @if($specialties != null)
              <label for="for_specialty_id">Especialidad</label>
              <select id="for_specialty_id" name="specialty_id" class="form-control" wire:model.lazy="specialty_id" required>
                  <option></option>
                  @foreach($specialties as $specialty)
                    <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
                  @endforeach
              </select>
        @endif

        @if($professions != null)
              <label for="for_profession_id">Profesión</label>
              <select id="for_profession_id" name="profession_id" class="form-control" wire:model.lazy="profession_id" required>
                  <option></option>
                  @foreach($professions as $profession)
                    <option value="{{$profession->id}}">{{$profession->profession_name}}</option>
                  @endforeach
              </select>
        @endif

        @if($specialties == null && $professions == null)
          <label for="for_profession_id">&nbsp;</label>
          <select class="form-control">
              <option></option>
          </select>
        @endif

      </div>

      <div class="form-group col-md-4">
          <label for="for_user_id">Funcionario</label>
          <select id="for_user_id" name="user_id" class="form-control" required>
              <option></option>
              @if($users != null)
              @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->OfficialFullName}}</option>
              @endforeach
              @endif
          </select>
      </div>
</div>
