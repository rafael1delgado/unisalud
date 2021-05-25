<div>
    @foreach($inputs as $key => $value)

            <div class="form-row">
                <fieldset class="form-group col-1">
                    <label for="for_addressType">Tipo de dirección</label>
                    <select name="addressType[]" class="form-control" wire:model="addressType.{{$value}}">
                        <option value=''></option>
                        <option value="particular" selected>Particular</option>
                        <option value="work">Trabajo</option>
                    </select>
                </fieldset>


                <fieldset class="form-group col-1">
                    <label for="for_streeNameType">Via de acceso</label>
                    <select name="streeNameType" class="form-control">
                        <option value="1">Calle</option>
                        {{--            @foreach($streetTypes as $type)--}}
                        {{--                <option value="{{ $type['code'] }}">{{ $type['display'] }}</option>--}}
                        {{--            @endforeach--}}
                    </select>
                </fieldset>

                <fieldset class="form-group col-2">
                    <label for="for_streetName">Calle</label>
                    <input type="text" class="form-control" name="streetName"
                            required
                           value="{{ substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 10) }}">
                </fieldset>

                <fieldset class="form-group col-1">
                    <label for="for_line">Número</label>
                    <input type="text" class="form-control" name="line"
                            required value="{{ substr(str_shuffle('0123456789'), 0, 4) }}">
                </fieldset>

                <fieldset class="form-group col-1">
                    <label for="for_addressApartament">Depto</label>
                    <input type="text" class="form-control" name="addressApartament"
                            required value="{{ substr(str_shuffle('0123456789'), 0, 2) }}">
                </fieldset>

                <fieldset class="form-group col-2">
                    <label for="for_poblacion">Población/Villa/Condominio</label>
                    <input type="text" class="form-control" name="poblacion"
                            required
                           value="{{ substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 10) }}">
                </fieldset>

                <fieldset class="form-group col-2">
                    <label for="for_district">Comuna</label>
                    <select name="district"  class="form-control">
                        <option value="1" selected>Iquique</option>
                        {{--                @foreach($communes as $commune)--}}
                        {{--                    <option value="{{ $commune['code'] }}">{{ $commune['display'] }}</option>--}}
                        {{--                @endforeach--}}
                    </select>
                </fieldset>

                <fieldset class="form-group col-2">
                    <label for="for_state">Región</label>
                    <select name="state"  class="form-control">
                        <option value="1" selected>Tarapacá</option>
                        {{--                @foreach($regions as $region)--}}
                        {{--                    <option value="{{ $region['code'] }}">{{ $region['display'] }}</option>--}}
                        {{--                @endforeach--}}
                    </select>
                </fieldset>
            </div>

            <div class="form-row">
                <fieldset class="form-group col-1">
                    <label for="for_latitud">Latitud</label>
                    <input type="text" class="form-control" name="latitud"
                            required value="{{ substr(str_shuffle('0123456789'), 0, 8) }}">
                </fieldset>
                <fieldset class="form-group col-1">
                    <label for="for_longitud">Longitud</label>
                    <input type="text" class="form-control" name="longitud"
                            required value="{{ substr(str_shuffle('0123456789'), 0, 8) }}">
                </fieldset>
                <fieldset class="form-group col-2">
                    <label for="for_city">Ciudad</label>
                    <input type="text" class="form-control" name="city"
                            required value="Iquique">
                </fieldset>
                <fieldset class="form-group col-2">
                    <label for="for_country">País</label>
                    <select name="country"  class="form-control">
                        <option value="01">Chile</option>
                    </select>
                </fieldset>
            </div>
    @endforeach

    <div class="form-row">
        <button type="button" class="btn btn-primary" wire:click.prevent="add({{$i}})">Agregar otra dirección</button>
    </div>
</div>
