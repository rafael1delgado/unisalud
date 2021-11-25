<form method="POST" action="{{ route('samu.call.syncQtcs', $call) }}">
    @csrf
    @method('POST')

    <div class="form-row">
        <fieldset class="col-md-6 col-12">
            <label for="qtcs" class="form-label mb-3">
                <b>Asignar uno o más QTCs al llamado</b>
            </label>
            
            @foreach ($shift->qtcs as $qtc)
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" 
                    name="qtcs[]" value="{{ $qtc->id }}"
                    @if(in_array($qtc->id, $call->qtcs->pluck('id')->toArray())) checked @endif>
                <label class="form-check-label" for="for_qtcs">
                    {{ $qtc->id }} - {{ $qtc->key->name }} <a href="{{ route('samu.qtc.edit',$qtc) }}" class="link-primary">[Ver qtc]</a>
                </label>
            </div>
            @endforeach

        </fieldset>
    </div>

    <button  class="btn btn-primary" type="submit">Asignar</button>

</form>