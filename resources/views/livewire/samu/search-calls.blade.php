<div>
    @include('samu.nav')

    <h3 class="mb-3"><i class="fas fa-phone"></i> Buscar llamadas</h3>


    <div class="form-row">
        <fieldset class="form-group col-6 col-md-2">
            <label for="for_date">Fecha</label>
            <input type="date" class="form-control" 
                wire:model="date" id="date" value="{{ old('date') }}"> 
        </fieldset>


        <fieldset class="form-group col-12 col-md-4">
            <label for="for_address">Dirección</label>
            <input type="text" class="form-control" 
                wire:model="address" value="{{ old('address') }}">
        </fieldset>

        <fieldset class="form-group col-12 col-md-2">
            <label for="for_commune">Comuna</label>
            <select class="form-control" wire:model="commune_id">
                <option value=""></option>
                @foreach($communes as $name => $id)
                <option value="{{ $id }}" {{ old('commune_id') == $id ? 'selected' : '' }}>{{ $name }}</option>
                @endforeach 
            </select>
        </fieldset>

        <div class="form-group col-12 col-md-1">
            <label for="">&nbsp;</label>
            <button type="submit" class="form-control btn btn-primary" wire:click="search">
                <i class="fas fa-search"></i> Buscar </button>
        </div>
    </div>



    @if($calls)
        @include('samu.call.partials.list', [
            'calls' => $calls, 
            'edit' => true,
            'createEvent' => false
        ])

    @endif
</div>
