<div>
    <div class="form-row">
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-registered-at">Hora<br>&nbsp;</label>

            <input 
                @if($edit) 
                    value="{{ optional(optional($event->vitalSign)->registered_at)->format('H:i') }}" 
                @endif 

                name="registered_at" 
                type="time" 
                class="form-control @error('registered_at') is-invalid @enderror" 
                id="for-registered-at">

            @error('registered_at')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-6 col-md-1">
            <label for="for-fc">Frecuencia <br>Cardiaca</label>

            <input 
                @if($edit) 
                    value="{{ optional($event->vitalSign)->fc }}" 
                @endif 

                name="fc" 
                type="text" 
                class="form-control @error('fc') is-invalid @enderror" 
                maxlength="8" 
                id="for-fc" {{ old('fc', optional($event)->fc) }}>

            @error('fc')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-6 col-md-1">
            <label for="for-fr">Frecuencia <br>Respiratoria</label>

            <input 
                @if($edit) value="{{ optional($event->vitalSign)->fr }}" @endif 
                name="fr" 
                type="number" 
                class="form-control @error('fr') is-invalid @enderror" 
                id="for-fr" {{ old('fr', optional($event)->fr) }}>

            @error('fr')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>

        <fieldset class="form-group col-6 col-md-1">
            <label for="for-pa">Presión <br>Arterial</label>

            <input 
                @if($edit) value="{{ optional($event->vitalSign)->pa }}" @endif 
                name="pa" 
                type="text" 
                class="form-control @error('pa') is-invalid @enderror" 
                id="for-pa" 
                {{ old('pa', optional($event)->pa) }}

                placeholder="xxx/xx">
            @error('pa')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-pam">Presión Arterial <br>Media</label>

            <input 
                @if($edit) value="{{ optional($event->vitalSign)->pam }}" @endif 
                name="pam" 
                type="text" 
                class="form-control @error('pam') is-invalid @enderror" 
                id="for-pam" {{ old('pam', optional($event)->pam) }}
                placeholder="xxx/xx">

            @error('pam')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-gl">Glasgow<br>&nbsp;</label>

            <input @if($edit) value="{{ optional($event->vitalSign)->gl }}" @endif name="gl" type="number" class="form-control @error('gl') is-invalid @enderror" id="for-gl" {{ old('gl', optional($event)->gl) }}>

            @error('gl')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-soam">% Saturacion <br>Oxigeno/Ambi.</label>

            <input @if($edit) value="{{ optional($event->vitalSign)->soam }}" @endif name="soam" type="number" class="form-control @error('soam') is-invalid @enderror" id="for-soam" {{ old('soam', optional($event)->soam) }}>

            @error('soam')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-soap">% Saturación <br>Oxigeno/Apoyo</label>

            <input @if($edit) value="{{ optional($event->vitalSign)->soap }}" @endif name="soap" type="number" class="form-control @error('soap') is-invalid @enderror" id="for-soap" {{ old('soap', optional($event)->soap) }}>

            @error('soap')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-hgt">HGT <br>mg/dl</label>

            <input @if($edit) value="{{ optional($event->vitalSign)->hgt }}" @endif name="hgt" type="number" class="form-control @error('hgt') is-invalid @enderror" id="for-hgt" {{ old('hgt', optional($event)->hgt) }}>

            @error('hgt')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-fill-capillary">Llene <br>Capilar</label>

            <input @if($edit) value="{{ optional($event->vitalSign)->fill_capillary }}" @endif name="fill_capillary" type="number" class="form-control @error('fill_capillary') is-invalid @enderror" id="for-fill-capillary" {{ old('fill_capillary', optional($event)->fill_capillary) }}>

            @error('fill_capillary')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
        <fieldset class="form-group col-6 col-md-1">
            <label for="for-t">Temperatura <br>°C</label>

            <input @if($edit) value="{{ optional($event->vitalSign)->t }}" @endif name="t" type="number" class="form-control @error('t') is-invalid @enderror" step=".01" id="for-t" {{ old('t', optional($event)->t) }}>

            @error('t')
                <div class="text-danger">
                    <small>{{ $message }}</small>
                </div>
            @enderror
        </fieldset>
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
