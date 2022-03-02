<div class="form-row">

    <fieldset class="form-group col-md-3">
        <label for="for-applicant">Solicitante</label>
        <input type="text" class="form-control form-control-sm @error('applicant') is-invalid @enderror" name="applicant" id="for-applicant"
            value="{{ old('applicant', optional($call)->applicant) }}">
        @error('applicant')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-md-5">
        <label for="for-address">Dirección</label>
        <input type="text" class="form-control form-control-sm @error('address') is-invalid @enderror" name="address" id="for-address"
            value="{{ old('address', optional($call)->address) }}">
        @error('address')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for-commune">Comuna</label>
        <select class="form-control form-control-sm @error('commune_id') is-invalid @enderror" name="commune_id" id="for-commune">
            <option value="">Selecciona una Comuna</option>
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

    <fieldset class="form-group col-md-2">
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

<div class="form-row">
    <fieldset class="form-group col-md-2">
        <label for="for-age">Edad</label>
        <input type="number" class="form-control form-control-sm @error('age') is-invalid @enderror" step=".1" name="age" id="for-age"
            value="{{ old('age', optional($call)->age) }}">
        @error('age')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-md-2">
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

    <fieldset class="form-group col-md-6">
        <label for="for-reason">Motivo</label>
        <input type="reason" class="form-control form-control-sm @error('reason') is-invalid @enderror" name="reason" id="for-reason"
            value="{{ old('reason', optional($call)->reason) }}">
        @error('reason')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-md-2">
        <label for="for-intervention">Intervención de Carabinero</label>
        <select class="form-control form-control-sm @error('intervention') is-invalid @enderror" name="intervention" id="for-intervention">
            <option value="">Selecciona una opción</option>
            <option value="0" {{ optional($call)->intervention == '0' ? 'selected' : '' }}>No</option>
            <option value="1" {{ optional($call)->intervention == '1' ? 'selected' : '' }}>Si</option>
        </select>
        @error('intervention')
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
        <select class="form-control form-control-sm @error('classification') is-invalid @enderror" name="classification" id="for-classification" {{ optional($call)->classification == 'OT' ? 'disabled readonly' : '' }}>
            <option value="">Selecciona una Clasificación</option>
            <option value="T1" {{ optional($call)->classification == 'T1' ? 'selected' : '' }}>T1</option>
            <option value="T2" {{ optional($call)->classification == 'T2' ? 'selected' : '' }}>T2</option>
            <option value="NM" {{ optional($call)->classification == 'NM' ? 'selected' : '' }}>NM</option>
            <option value="OT" {{ optional($call)->classification == 'OT' ? 'selected' : '' }}>OT</option>
        </select>
        <small id="for-classification" class="form-text text-danger">Si hace referencia a otra llamada, no debe clasificarla.</small>
        @error('classification')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
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
    <div id="map"></div>
</div>
 
<div class="form-row">

    <fieldset class="form-group col-md-3">
        <label for="latitude">Latitud </label>
        <input type="text" class="form-control form-control-sm @error('latitude') is-invalid @enderror" name="latitude" id="latitude"
            value="{{ old('latitude', optional($call)->latitude) }}">
        @error('latitude')
            <div class="text-danger">
                <small>{{ $message }}</small>
            </div>
        @enderror
    </fieldset>

    <fieldset class="form-group col-md-3">
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
