<form method="POST" action="{{ route('samu.call.syncEvents', $call) }}">
    @csrf
    @method('POST')

    <div class="form-row mb-3">
        <fieldset class="col-md-12 col-12">
            <button  class="btn btn-success" type="submit">Asignar uno o más cometidos a la llamada</button>
        </fieldset>
    </div>
    <div class="form-row">
        <fieldset class="col-md-12 col-12">
            @foreach ($shift->events->reverse() as $key => $event)
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" 
                    name="events[]" value="{{ $event->id }}"
                    @if(in_array($event->id, $call->events->pluck('id')->toArray())) checked @endif>
                <label class="form-check-label" for="for_events">
                    <b>Cometido:</b>  
                    <a href="{{ route('samu.event.edit', $event) }}">
                        <button class="btn btn-sm btn-outline-primary"><i class="fas fa-edit"></i> {{ $event->id }}</button>
                    </a>
                    - <b>Clave:</b> {{ $event->key->name }} 
                    - <b>Mobil:</b> {{ optional($event->mobile)->code }} {{ optional($event->mobile)->name }}
                </label>
            </div>
            @endforeach
        </fieldset>

    </div>

</form>