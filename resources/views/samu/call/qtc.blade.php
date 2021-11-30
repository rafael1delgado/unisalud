<form method="POST" action="{{ route('samu.call.syncQtcs', $call) }}">
    @csrf
    @method('POST')

    <div class="form-row">
        <fieldset class="col-md-12 col-12">
            <label for="qtcs" class="form-label mb-3">
                <b>Asignar uno o más QTCs al llamado</b>
            </label>
        
        </fieldset>
        <fieldset class="col-md-12 col-12 mb-3">
        <button  class="btn btn-primary" type="submit">Asignar</button>
        <a class="btn btn-success ml-3" href="{{ route('samu.qtc.create') }}">
            <i class="fas fa-plus"></i> Crear QTC
        </a>
        </fieldset>
        <fieldset class="col-md-12 col-12">
            
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

    

</form>