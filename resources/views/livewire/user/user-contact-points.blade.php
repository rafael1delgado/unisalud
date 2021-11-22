<div>
    @foreach($contactPoints as $key => $value)
    <div class="card mb-3">
        <div class="card-body">
            <h5 class="card-title">Contacto {{$key + 1}}</h5>


            <input type="hidden" name='contact_point_id[]' wire:model='contactPoints.{{$key}}.id'>

            <div class="form-row">
                <fieldset class="form-group col-md-4">
                    <label for="for_contact_system">Tipo Contacto *</label>
                    <select name="contact_system[]" class="form-control" wire:model='contactPoints.{{$key}}.system' required
                        >
                        <option value="phone">Teléfono</option>
                        <option value="email">Email</option>
                        <option value="fax">Fax</option>
                        <option value="url">URL</option>
                        <option value="sms">SMS</option>
                        <option value="other">Other</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-md-3">
                    <label for="for_contact_use">Uso *</label>
                    <select name="contact_use[]" class="form-control" required
                    wire:model='contactPoints.{{$key}}.use'
                        >
                        <option value="mobile">Móvil</option>
                        <option value="home">Casa</option>
                        <option value="work">Trabajo</option>
                        <option value="temp">Temporal</option>
                        <option value="old">Antiguo</option>
                    </select>
                </fieldset>

                <fieldset class="form-group col-md-4">
                    <label for="for_contact_value">Contacto *</label>
                    <input type="text" class="form-control" name="contact_value[]" required
                        wire:model='contactPoints.{{$key}}.value'
                        {{-- value="9{{ substr(str_shuffle('0123456789'), 0, 8) }}" --}}
                        >
                </fieldset>

                <fieldset class=" form-group col-md-1">
                    <label for="for_id_dv">Predeterminado</label>
                    <div class="form-check form-check-inline">
                        <input type="radio"  value="1" name="contact_actually[]" class="form-check-input"   {{ ( ( isset($contactPoints[$key])   && isset($contactPoints[$key]["actually"]) && $contactPoints[$key]["actually"] == 1 )? "checked" : "" )}} >
                    </div>
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
        <button type="button" class="btn btn-primary" wire:click.prevent="add()"> <i class="fa fa-plus" aria-hidden="true"></i> Agregar otro contacto</button>
    </div>
</div>
