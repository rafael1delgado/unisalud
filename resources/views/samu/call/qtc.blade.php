<form method="POST" action="{{ route('samu.call.update', $call) }}">
    @csrf
    @method('POST')

    <div class="form-row">
        <fieldset class="col-md-6 col-12">
            <label for="qtcs" class="form-label">
                QTCS
            </label>
            
            @foreach ($shift->qtcs as $qtc)
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Check me out</label>
            </div>
            @endforeach

        </fieldset>
    </div>

    <button  class="btn btn-primary" type="submit">Guardar</button>

</form>