<div class="row">

  <fieldset class="form-group col">
    <label for="for_specialty_id">Especialidad</label>
    <select name="specialty_id" id="law" class="form-control" wire:model.lazy="specialty_id">
      <option value=""></option>
      @foreach ($specialties as $key => $specialty)
      <option value="{{$specialty->id}}">{{$specialty->specialty_name}}</option>
      @endforeach
    </select>
  </fieldset>

  <fieldset class="form-group col">
    <label for="for_activity_id">Actividad</label>
    <select name="activity_id" id="for_activity_id" class="form-control" required>
      <option value=""></option>
      @if($activities != null)
      @foreach ($activities as $key => $activity)
      <option value="{{$activity->id}}" id="{{$activity->name}}">{{$activity->activity_name}}</option>
      @endforeach
      @endif
    </select>
  </fieldset>

</div>
