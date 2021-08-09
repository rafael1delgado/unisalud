<div>
    @foreach($inputs as $key => $value)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Funcionario {{$key + 1}}</h5>


                <input type="hidden" name='practitioner_id[]' wire:model='practitioners.{{$value}}.id'>

                <div class="form-row">
                    <fieldset class="form-group col-md-4">
                        <label for="for_organization_id">Organización</label>
                        <select name="organization_id[]" class="form-control"
                                wire:model='practitioners.{{$value}}.organization_id'
                                >
                            <option value=""></option>
                            @foreach($organizations as $organization)
                                <option value="{{ $organization->id }}">{{ $organization->alias }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-md-4">
                        <label for="for_profession_id">Profesión</label>
                        <select name="profession_id[]" class="form-control"
                                wire:model='practitioners.{{$value}}.profession_id'
                                >
                            <option value=""></option>
                            @foreach($professions as $profession)
                                <option value="{{ $profession->id }}">{{ $profession->profession_name }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-md-3">
                        <label for="for_specialty_id">Especialidad</label>
                        <select name="specialty_id[]" class="form-control"
                                wire:model='practitioners.{{$value}}.specialty_id'
                                >
                            <option value=""></option>
                            @foreach($specialties as $specialty)
                                <option value="{{ $specialty->id }}">{{ $specialty->specialty_name}}</option>
                            @endforeach

                        </select>
                    </fieldset>


                    @if($key != 0)
                        <fieldset class="form-group offset-5 col-1">
                            <label for=""></label>
                            <button class="btn btn-danger btn-block" wire:click.prevent="remove({{$key}})"> <i class="fa fa-minus" aria-hidden="true"></i> Remover
                            </button>
                        </fieldset>
                    @endif

                </div>

            </div>
        </div>
    @endforeach

    <div class="form-row">
        <button type="button" class="btn btn-primary" wire:click.prevent="add({{$i}})"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar otra organización
        </button>
    </div>
</div>
