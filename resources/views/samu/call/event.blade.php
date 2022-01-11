<form method="POST" action="{{ route('samu.call.syncEvents', $call) }}">
    @csrf
    @method('POST')

    <div class="form-row mb-3">
        <fieldset class="col-md-12 col-12">
            <label for="events" class="form-label mb-3">
                <b>Asignar uno o más Eventos al llamado</b>
            </label>
        </fieldset>

        <fieldset class="col-md-12 col-12">
            <button  class="btn btn-primary" type="submit">Asignar</button>
            <a class="btn btn-success ml-3" href="{{ route('samu.event.create') }}">
                <i class="fas fa-plus"></i> Crear Evento
            </a>
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