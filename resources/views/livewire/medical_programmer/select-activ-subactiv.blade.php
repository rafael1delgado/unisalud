<div>
  <div class="row">

    <fieldset class="form-group col col-md">
        <label for="">Actividades</label>
        <select class="form-control" name="activity_id" wire:model="activity_id" required>
          <option value=""></option>
          @if($specialtyActivities != null)
            @foreach($specialtyActivities as $specialtyActivity)
              <option value="{{$specialtyActivity->activity->id}}">{{$specialtyActivity->activity->activity_name}}</option>
             @endforeach
           @endif
        </select>
    </fieldset>

    <fieldset class="form-group col col-md">
        <label for="">Sub-actividades</label>
        <select class="form-control" name="sub_activity_id" required>
          <option value=""></option>
           @if($subactivities != null)
             @foreach($subactivities as $subactivity)
               <option value="{{$subactivity->id}}">{{$subactivity->sub_activity_name}}</option>
             @endforeach
           @endif
        </select>
    </fieldset>

  </div>
</div>
