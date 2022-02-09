<form method="POST" action="{{ route('samu.call.syncEvents', $call) }}">
    @csrf
    @method('POST')

    <div class="form-row mb-3">
        <fieldset class="col-md-12 col-12">
            <button  class="btn btn-success" type="submit">Asignar uno o más eventos al llamado</button>
        </fieldset>
    </div>
    <div class="form-row">
        <fieldset class="col-md-12 col-12">
            @foreach ($shift->events as $key => $event)
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" 
                    name="events[]" value="{{ $event->id }}"
                    @if(in_array($event->id, $call->events->pluck('id')->toArray())) checked @endif>
                <label class="form-check-label" for="for_events">
                    Evento turno: {{ ++$key }} - Evento global: {{ $event->id }} - {{ $event->key->name }} 
                    <a href="{{ route('samu.event.edit',$event) }}" class="link-primary">[Ver event]</a>
                </label>
            </div>
            @endforeach
        </fieldset>

    </div>

</form>