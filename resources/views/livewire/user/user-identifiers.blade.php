<div>
    @foreach($inputs as $key => $value)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Identificador {{$key + 1}}</h5>

            <input type="hidden" name='identifier_id[]' wire:model='identifiers.{{$value}}.id'>

            <div class="form-row">
                <fieldset class="form-group col-md-4">
                    <label for="for_id_type">Tipo de identificación</label>
                    <select name="id_type[]" class="form-control" wire:model='identifiers.{{$value}}.id_type' required>
                        @foreach($identifierTypes as $identifierType)
                        <option value="{{ $identifierType->id }}">{{ $identifierType->text }}</option>
                        @endforeach
                    </select>
                </fieldset>

                <fieldset class="form-group col-md-4">
                    <label for="for_id_value">Número</label>
                    <input type="text" class="form-control" name="id_value[]" wire:model='identifiers.{{$value}}.value' required
                        {{-- value=" {{substr(str_shuffle('1234567890'), 0, 8)}} " --}}
                        >
                </fieldset>

                <fieldset class=" form-group col-md-1">
                    <label for="for_id_dv">DV</label>
                    <input type="text" class="form-control" name="id_dv[]" wire:model='identifiers.{{$value}}.dv' 
                        {{-- value="{{substr(str_shuffle('1234567890k'), 0, 1)}}" --}}>
                </fieldset>

                <fieldset class="form-group col-md-3">
                    <label for="for_id_use">Uso</label>
                    <select name="id_use[]" class="form-control" wire:model='identifiers.{{$value}}.use' required>
                        <option value="official">Oficial</option>
                        <option value="temp">Temporal</option>
                        <option value="usual">Usual</option>
                        <option value="secondary">Secundario</option>
                        <option value="old">Antiguo</option>
                    </select>
                </fieldset>
            </div>

            <div class="form-row">
                @if($key != 0)
                <fieldset class="form-group offset-5 col-1">
                    <label for=""></label>
                    <button class="btn btn-danger btn-block" wire:click.prevent="remove({{$key}})">Remover
                    </button>
                </fieldset>
                @endif
            </div>

        </div>
    </div>
    @endforeach

    <div class="form-row">
        <button type="button" class="btn btn-primary" wire:click.prevent="add({{$i}})">Agregar otro
            identificador</button>
    </div>
</div>