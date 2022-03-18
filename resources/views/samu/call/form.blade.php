<div class="form-row">

    <fieldset class="form-group col-12 col-md-3">
        <label for="for-applicant">Solicitante</label>
        <input type="text" class="form-control form-control-sm @error('applicant') is-invalid @enderror" name="applicant" id="for-applicant"
            value="{{ old('applicant', optional($call)->applicant) }}">
        @error('applicant')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-12 col-md-5">
        <label for="for-address">Dirección</label>
        <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" id="for-address"
            value="{{ old('address', optional($call)->address) }}">
        @error('address')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-12 col-md-2">
        <label for="for-commune">Comuna</label>
        <select class="form-control form-control-sm @error('commune_id') is-invalid @enderror" name="commune_id" id="for-commune">
            <option value=""></option>
            @foreach ($communes as $commune)
            <option value="{{ $commune->id }}" {{ optional($call)->commune_id == $commune->id ? 'selected' : '' }}>
                {{ $commune->name }}
            </option>
            @endforeach
        </select>
        @error('commune_id')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>
    
    <fieldset class="form-group col-12 col-md-2">
        <label for="for-telephone">Teléfono</label>
        <input type="text" class="form-control form-control-sm @error('telephone') is-invalid @enderror" name="telephone" id="for-telephone"
            value="{{ old('telephone', optional($call)->telephone) }}">
        @error('telephone')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

</div>

<div class="form-row">
    <!-- <fieldset class="form-group col-12 col-md-3">
        <label for="for-reason">Motivo</label>
        <input type="reason" class="form-control form-control-sm @error('reason') is-invalid @enderror" name="reason" id="for-reason"
        value="{{ old('reason', optional($call)->reason) }}">
        @error('reason')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset> -->
    
    <fieldset class="form-group col-6 col-md-2">
        <label for="for-sex">Sexo</label>
        <select class="form-control form-control-sm @error('sex') is-invalid @enderror" name="sex" id="for-sex">
            <option value="">Selecciona un Sexo</option>
            <option value="MALE" {{ optional($call)->sex == 'MALE' ? 'selected' : '' }}>Masculino</option>
            <option value="FEMALE" {{ optional($call)->sex == 'FEMALE' ? 'selected' : '' }}>Femenino</option>
            <option value="UNKNOWN" {{ optional($call)->sex == 'UNKNOWN' ? 'selected' : '' }}>Indeterminado</option>
            <option value="OTHER" {{ optional($call)->sex == 'OTHER' ? 'selected' : '' }}>Otro</option>
        </select>
        @error('sex')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>
    
    <fieldset class="form-group col-6 col-md-1">
        <label for="for-year">Años</label>
        <input type="number" class="form-control form-control-sm @error('year') is-invalid @enderror" name="year" id="for-year"
            value="{{ old('year', optional($call)->year) }}" >
        @error('year')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-6 col-md-1">
        <label for="for-month">Meses</label>
        <input type="number" class="form-control form-control-sm @error('month') is-invalid @enderror" name="month" id="for-month"
            value="{{ old('month', optional($call)->month) }}">
        @error('month')
        <div class="text-danger">
            <small>{{ $message }}</small>
        </div>
        @enderror
    </fieldset>
    
    <fieldset class="form-group col-12 col-md-2">
        <label for="for-police_intervention">Intervención de carabineros</label>
        <select class="form-control form-control-sm @error('police_intervention') is-invalid @enderror" name="police_intervention" id="for-police_intervention">
            <option value="">Selecciona una opción</option>
            <option value="1" {{ optional($call)->police_intervention == '1' ? 'selected' : '' }}>Si</option>
            <option value="0" {{ optional($call)->police_intervention == '0' ? 'selected' : '' }}>No</option>
        </select>
        @error('police_intervention')
            <div class="text-danger">
                <small>{{ $message }}</small> 
            </div>
        @enderror
    </fieldset>
        
</div>
    
<div class="form-row">

    <fieldset class="form-group col-md-12">
        <label for="for-information">Información telefónica *</label>
        <textarea class="form-control form-control-sm @error('information') is-invalid @enderror" name="information" rows="5" id="for-information" required>{{ old('information', optional($call)->information) }}</textarea>
        @error('information')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

</div>


@if(request()->routeIs('samu.call.edit'))

<div class="form-row">
    <fieldset class="form-group col-md-3">
        <label for="for-classification">Clasificación</label>
        @if($call->classification != 'OT')
        <select class="form-control form-control-sm @error('classification') is-invalid @enderror" name="classification" id="for-classification">
            <option value="">Selecciona una Clasificación</option>
            <option value="T1" {{ old('classification', optional($call)->classification) == 'T1' ? 'selected' : '' }}>T1</option>
            <option value="T2" {{ old('classification', optional($call)->classification) == 'T2' ? 'selected' : '' }}>T2</option>
            <option value="NM" {{ old('classification', optional($call)->classification) == 'NM' ? 'selected' : '' }}>NM</option>
            <option value="OT" {{ old('classification', optional($call)->classification) == 'OT' ? 'selected' : '' }}>OT</option>
        </select>
        <small id="for-classification" class="form-text text-danger">Si hace referencia a otra llamada, no debe clasificarla.</small>
        @else
            <input type="text" class="form-control form-control-sm" name="classification" id="for-classification" readonly
                value="{{ optional($call)->classification }}" >
        @endif
        @error('classification')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-md-3">
        <label for="for-key">Clave</label>
        <select class="form-control form-control-sm" name="key_id" id="for-key">
            <option value="">Selecciona una Clave</option>
            @foreach($keys as $key)
            <option value="{{ $key->id }}" {{ old('key_id', optional($call)->key_id) == $key->id ? 'selected' : '' }}>
                {{ $key->key }} - {{ $key->name }}
            </option>
            @endforeach 
        </select>
    </fieldset>
</div>
<div class="form-row">

    <fieldset class="form-group col-md-12">
        <label for="for-regulation">Regulación</label>
        <textarea class="form-control form-control-sm @error('regulation') is-invalid @enderror" name="regulation" rows="5" id="for-regulation">{{ old('regulation', optional($call)->regulation) }}</textarea>
        @error('regulation')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

</div>
@endif

<div class="my-1">
    <button type="submit" class="btn btn-primary">Guardar</button>

    <a href="{{ route('samu.call.index') }}" class="btn btn-outline-secondary">Cancelar</a>
</div>

<div class="my-3">
    <label for="for-regulation">Mueva el pin para ubicar la llamada en el mapa</label>
    <div id="map"></div>
</div>
 
<div class="form-row">

    <fieldset class="form-group col-6 col-md-3">
        <label for="latitude">Latitud </label>
        <input type="text" class="form-control form-control-sm @error('latitude') is-invalid @enderror" name="latitude" id="latitude"
            value="{{ old('latitude', optional($call)->latitude) }}">
        @error('latitude')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-6 col-md-3">
        <label for="longitude">Longitud</label>
        <input type="text" class="form-control form-control-sm @error('longitude') is-invalid @enderror" name="longitude" id="longitude"
            value="{{ old('longitude', optional($call)->longitude) }}">
        @error('longitude')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

</div>
