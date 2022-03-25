<div>
    <div class="form-row">
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-registered-at">Hora<br>&nbsp;</label>
            <input @if($edit) wire:model="registered_at" @else name="registered_at" @endif type="time" class="form-control @error('registered_at') is-invalid @enderror" id="for-registered-at">
            @error('registered_at')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-fc">Frecuencia <br>Cardiaca</label>
            <input @if($edit) wire:model="fc" @else name="fc" @endif type="text" class="form-control @error('fc') is-invalid @enderror" maxlength="8" id="for-fc" value="{{ old('fc', optional($event)->fc) }}">
            @error('fc')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-fr">Frecuencia <br>Respiratoria</label>
            <input @if($edit) wire:model="fr" @else name="fr" @endif type="number" class="form-control @error('fr') is-invalid @enderror" id="for-fr" value="{{ old('fr', optional($event)->fr) }}">
            @error('fr')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-pa">Presión <br>Arterial</label>
            <input @if($edit) wire:model="pa" @else name="pa" @endif type="text" class="form-control @error('pa') is-invalid @enderror" id="for-pa" value="{{ old('pa', optional($event)->pa) }}" 
                placeholder="xxx/xx">
            @error('pa')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-pam">Presión Arterial <br>Media</label>
            <input @if($edit) wire:model="pam" @else name="pam" @endif type="text" class="form-control @error('pam') is-invalid @enderror" id="for-pam" value="{{ old('pam', optional($event)->pam) }}"
                placeholder="xxx/xx">
            @error('pam')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-gl">Glasgow<br>&nbsp;</label>
            <input @if($edit) wire:model="gl" @else name="gl" @endif type="number" class="form-control @error('gl') is-invalid @enderror" id="for-gl" value="{{ old('gl', optional($event)->gl) }}">
            @error('gl')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-soam">% Saturacion <br>Oxigeno/Ambi.</label>
            <input @if($edit) wire:model="soam" @else name="soam" @endif type="number" class="form-control @error('soam') is-invalid @enderror" id="for-soam" value="{{ old('soam', optional($event)->soam) }}">
            @error('soam')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-soap">% Saturación <br>Oxigeno/Apoyo</label>
            <input @if($edit) wire:model="soap" @else name="soap" @endif type="number" class="form-control @error('soap') is-invalid @enderror" id="for-soap" value="{{ old('soap', optional($event)->soap) }}">
            @error('soap')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-hgt">HGT <br>mg/dl</label>
            <input @if($edit) wire:model="hgt" @else name="hgt" @endif type="number" class="form-control @error('hgt') is-invalid @enderror" id="for-hgt" value="{{ old('hgt', optional($event)->hgt) }}">
            @error('hgt')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-fill-capillary">Llene <br>Capilar</label>
            <input @if($edit) wire:model="fill_capillary" @else name="fill_capillary" @endif type="number" class="form-control @error('fill_capillary') is-invalid @enderror" id="for-fill-capillary" value="{{ old('fill_capillary', optional($event)->fill_capillary) }}">
            @error('fill_capillary')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-t">Temperatura <br>°C</label>
            <input @if($edit) wire:model="t" @else name="t" @endif type="number" class="form-control @error('t') is-invalid @enderror" step=".01" id="for-t" value="{{ old('t', optional($event)->t) }}">
            @error('t')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        @if($edit && $event->status)
        <fieldset class="form-group col-6 col-md-1 mt-5">
            <button 
                class="btn btn-block btn-success"
                type="button"
                wire:click="updateVitalSign()"
                wire:loading.attr="disabled"
                wire:target="updateVitalSign"
                >
                <span
                    class="spinner-border spinner-border-sm"
                    role="status"
                    aria-hidden="true"
                    wire:loading
                    wire:target="updateVitalSign">
                </span>
                <i class="fas fa-sync" wire:loading.remove wire:target="updateVitalSign"></i> 
                Actualizar
            </button>
        </fieldset>
        @endif
    </div>

    {{-- <div class="table-responsive">
        <table class="table table-sm table-bordered">
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
                <tr class="text-center">
                    <td>{{ $event->vitalSign->registered_at ? $event->vitalSign->registered_at : '-' }}</td>
                    <td>{{ $event->vitalSign->fc ? $event->vitalSign->fc : '-' }}</td>
                    <td>{{ $event->vitalSign->fr ? $event->vitalSign->fr : '-' }}</td>
                    <td>{{ $event->vitalSign->pa ? $event->vitalSign->pa : '-' }}</td>
                    <td>{{ $event->vitalSign->pam ? $event->vitalSign->pam : '-'}}</td>
                    <td>{{ $event->vitalSign->gl ? $event->vitalSign->gl : '-' }}</td>
                    <td>{{ $event->vitalSign->soam ? $event->vitalSign->soam : '-'}}</td>
                    <td>{{ $event->vitalSign->soap ? $event->vitalSign->soap : '-'}}</td>
                    <td>{{ $event->vitalSign->hgt ? $event->vitalSign->hgt : '-'}}</td>
                    <td>{{ $event->vitalSign->fill_capillary ? $event->vitalSign->fill_capillary : '-'}}</td>
                    <td>{{ $event->vitalSign->t ? $event->vitalSign->t : '-'}}</td>
                    <td>
                        <button type="button" class="btn btn-sm btn-danger" title="Elimina Signo Vital">
                            <i class="fas fa-trash"></i>
                        </button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div> --}}
</div>
