<div>
    <div class="form-row">
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-fc">Frecuencia <br>Cardiaca</label>
            <input type="text" class="form-control @error('fc') is-invalid @enderror" maxlength="8" wire:model="fc" id="for-fc" value="{{ old('fc', optional($event)->fc) }}">
            @error('fc')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-fr">Frecuencia <br>Respiratoria</label>
            <input type="number" class="form-control @error('fr') is-invalid @enderror" wire:model="fr" id="for-fr" value="{{ old('fr', optional($event)->fr) }}">
            @error('fr')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-pa">Presión <br>Arterial</label>
            <input type="text" class="form-control @error('pa') is-invalid @enderror" wire:model="pa" id="for-pa" value="{{ old('pa', optional($event)->pa) }}" 
                placeholder="xxx/xx">
            @error('pa')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-pam">Presión Arterial <br>Media</label>
            <input type="text" class="form-control @error('pam') is-invalid @enderror" wire:model="pam" id="for-pam" value="{{ old('pam', optional($event)->pam) }}"
                placeholder="xxx/xx">
            @error('pam')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-gl">Glasgow<br>&nbsp;</label>
            <input type="number" class="form-control @error('gl') is-invalid @enderror" wire:model="gl" id="for-gl" value="{{ old('gl', optional($event)->gl) }}">
            @error('gl')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-soam">% Saturacion <br>Oxigeno/Ambi.</label>
            <input type="number" class="form-control @error('soam') is-invalid @enderror" wire:model="soam" id="for-soam" value="{{ old('soam', optional($event)->soam) }}">
            @error('soam')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-soap">% Saturación <br>Oxigeno/Apoyo</label>
            <input type="number" class="form-control @error('soap') is-invalid @enderror" wire:model="soap" id="for-soap" value="{{ old('soap', optional($event)->soap) }}">
            @error('soap')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-hgt">HGT <br>mg/dl</label>
            <input type="number" class="form-control @error('hgt') is-invalid @enderror" wire:model="hgt" id="for-hgt" value="{{ old('hgt', optional($event)->hgt) }}">
            @error('hgt')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-fill-capillary">Llene <br>Capilar</label>
            <input type="number" class="form-control @error('fill_capillary') is-invalid @enderror" wire:model="fill_capillary" id="for-fill-capillary" value="{{ old('fill_capillary', optional($event)->fill_capillary) }}">
            @error('fill_capillary')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-t">Temperatura <br>°C</label>
            <input type="number" class="form-control @error('t') is-invalid @enderror" step=".01" wire:model="t" id="for-t" value="{{ old('t', optional($event)->t) }}">
            @error('t')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-created-at">Hora</label>
            <input type="time" class="form-control @error('time') is-invalid @enderror" id="for-created-at" wire:model="time">
            @error('time')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1 mt-5 pt-1">
            <button type="button" id="btn-add" wire:click="addVitalSign()" class="btn btn-block btn-sm btn-success">
                <i class="fas fa-plus"></i> Agregar
            </button>
        </fieldset>
        
    </div>

    <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped small">
            <thead>
                <tr>
                    <th>Fecha y Hora</th>
                    <th>F. Cardíaca</th>
                    <th>F. Respiratoria</th>
                    <th>Presión Arterial</th>
                    <th>Presión Arterial Media</th>
                    <th>Glasgow</th>
                    <th>% Sat. Oxígeno/Ambi.</th>
                    <th>% Sat. Oxígeno/Apoyo</th>
                    <th>HGT mg/dl</th>
                    <th>Llene capilar</th>
                    <th>Temperatura °C</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <input type="hidden" name="vital_signs" value="{{ $vitalSigns }}">                    
                @forelse($vitalSigns as $index => $vs)
                <tr>
                    <td>{{ $vs['datetime_format'] ? $vs['datetime_format'] : '-' }}</td>
                    <td>{{ $vs['fc'] ? $vs['fc'] : '-' }}</td>
                    <td>{{ $vs['fr'] ? $vs['fr'] : '-' }}</td>
                    <td>{{ $vs['pa'] ? $vs['pa'] : '-' }}</td>
                    <td>{{ $vs['pam'] ? $vs['pam'] : '-'}}</td>
                    <td>{{ $vs['gl'] ? $vs['gl'] : '-' }}</td>
                    <td>{{ $vs['soam'] ? $vs['soam'] : '-'}}</td>
                    <td>{{ $vs['soap'] ? $vs['soap'] : '-'}}</td>
                    <td>{{ $vs['hgt'] ? $vs['hgt'] : '-'}}</td>
                    <td>{{ $vs['fill_capillary'] ? $vs['fill_capillary'] : '-'}}</td>
                    <td>{{ $vs['t'] ? $vs['t'] : '-'}}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" title="Elimina Signo Vital" wire:click="deleteVitalSign({{ $index }})">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
                @empty
                <tr class="text-center">
                    <td colspan="12">
                        <em>No hay registros</em>
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
