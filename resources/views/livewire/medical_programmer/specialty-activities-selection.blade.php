<div class="form-row">

  <fieldset class="form-group col-6 col-md-3">
    <label for="for_specialty_id">Especialidad</label>
    <div wire:ignore id="for-bootstrap-select-specialty-id">
      <select name="specialty_id" id="for_specialty_id" class="form-control selectpicker" wire:model.lazy="specialty_id" data-live-search="true" data-size="5" data-container="#for-bootstrap-select-specialty-id" @if($specialty_id) required @endif>
        <option value=""></option>
        @foreach ($specialties as $key => $specialty)
        <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
        @endforeach
      </select>
    </div>
  </fieldset>

  <fieldset class="form-group col-6 col-md-3">
    <label for="for_specialty_id">Profesión</label>
    <div wire:ignore id="for-bootstrap-select-profession-id">
      <select name="profession_id" id="for_profession_id" class="form-control selectpicker" wire:model.lazy="profession_id" data-live-search="true" data-size="5" data-container="#for-bootstrap-select-profession-id" @if($profession_id) required @endif>
        <option value=""></option>
        @foreach ($professions as $key => $profession)
        <option value="{{$profession->id}}">{{$profession->profession_name}}</option>
        @endforeach
      </select>
    </div>
  </fieldset>

  <fieldset class="form-group col-6 col-md-3">
    <label for="for_activity_id">Actividad</label>
    <!-- <div wire:ignore id="for-bootstrap-select-activity-id"> -->
      <select name="activity_id" id="for_activity_id" class="form-control" wire:model.lazy="activity_id" required>
        <option value=""></option>
        @if($activities != null)
        @foreach ($activities as $key => $activity)
        <option value="{{$activity->id}}" >{{$activity->activity_name}}</option>
        @endforeach
        @endif
      </select>
    <!-- </div> -->
  </fieldset>

  <fieldset class="form-group col-6 col-md-3">
    <label for="for_activity_id">Rdto</label>
    <input type="text" class="form-control" name="" @if($performance) value="{{$performance}}" @endif disabled>
  </fieldset>

</div>
