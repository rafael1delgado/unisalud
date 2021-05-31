<div>
    @foreach($inputs as $key => $value)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="card-title">Dirección {{$key + 1}}</h5>
                <div class="form-row">
                    <fieldset class="form-group col-1">
                        <label for="for_address_type">Tipo de dirección</label>
                        <select name="address_type[]" class="form-control" >
                            <option value=''></option>
                            <option value="home" selected>Casa</option>
                            <option value="work">Trabajo</option>
                            <option value="temp">Temporal</option>
                            <option value="old">Antiguo</option>
                            <option value="billing">Facturación</option>
                        </select>
                    </fieldset>

{{--                    <fieldset class="form-group col-1">--}}
{{--                        <label for="for_streeNameType">Via de acceso</label>--}}
{{--                        <select name="streeNameType[]" class="form-control">--}}
{{--                            <option value="1">Calle</option>--}}
{{--                            --}}{{--            @foreach($streetTypes as $type)--}}
{{--                            --}}{{--                <option value="{{ $type['code'] }}">{{ $type['display'] }}</option>--}}
{{--                            --}}{{--            @endforeach--}}
{{--                        </select>--}}
{{--                    </fieldset>--}}

                    <fieldset class="form-group col-2">
                        <label for="for_street_name">Calle</label>
                        <input type="text" class="form-control" name="street_name[]"
                               required
{{--                               value="{{ substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 10) }}"--}}
                        >
                    </fieldset>

                    <fieldset class="form-group col-1">
                        <label for="for_line">Número</label>
                        <input type="text" class="form-control" name="line[]"
                               required
{{--                               value="{{ substr(str_shuffle('0123456789'), 0, 4) }}"--}}
                        >
                    </fieldset>

                    <fieldset class="form-group col-1">
                        <label for="for_address_apartament">Depto</label>
                        <input type="text" class="form-control" name="address_apartament[]"
                               required
{{--                               value="{{ substr(str_shuffle('0123456789'), 0, 2) }}"--}}
                        >
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_poblacion">Población/Villa/Condominio</label>
                        <input type="text" class="form-control" name="poblacion[]"
                               required
{{--                               value="{{ substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 10) }}"--}}
                        >
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_district">Comuna</label>
                        <select name="district[]" class="form-control">
                            <option value=""></option>
                            @foreach($communes as $commune)
                                <option value="{{ $commune->id }}">{{ $commune->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>

                    <fieldset class="form-group col-2">
                        <label for="for_state">Región</label>
                        <select name="state[]" class="form-control">
                            <option value=""></option>
                            @foreach($regions as $region)
                                <option value="{{ $region->id }}">{{ $region->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                </div>

                <div class="form-row">
                    <fieldset class="form-group col-1">
                        <label for="for_latitud">Latitud</label>
                        <input type="text" class="form-control" name="latitud[]"
                               required
{{--                               value="{{ substr(str_shuffle('0123456789'), 0, 8) }}"--}}
                        >
                    </fieldset>
                    <fieldset class="form-group col-1">
                        <label for="for_longitud">Longitud</label>
                        <input type="text" class="form-control" name="longitud[]"
                               required
{{--                               value="{{ substr(str_shuffle('0123456789'), 0, 8) }}"--}}
                        >
                    </fieldset>
                    <fieldset class="form-group col-2">
                        <label for="for_city">Ciudad</label>
                        <input type="text" class="form-control" name="city[]"
                               required
{{--                               value="Iquique"--}}
                        >
                    </fieldset>
                    <fieldset class="form-group col-2">
                        <label for="for_country">País</label>
                        <select name="country[]" class="form-control">
                            <option value=""></option>
                            @foreach($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </fieldset>
                    @if($key != 0)
                        <fieldset class="form-group offset-4 col-1">
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
        <button type="button" class="btn btn-primary" wire:click.prevent="add({{$i}})">Agregar otra dirección</button>
    </div>
</div>
