<div class="form-group">
    <label>Ingrese la comuna</label>
    <input class="form-control" list="communes" wire:model.debounce.250ms="search">
    
    <datalist id="communes">
        @foreach($communes as $commune)
        <option data-value="{{ $commune->id }}" value="{{ $commune->name }}">
        @endforeach
    </datalist>

    <select data-live-search="true" class="selectpicker form-control">
        @foreach($communes as $commune)
        <option value="{{ $commune->id }}">{{ $commune->name }}</option>
        @endforeach
    </select>
</div>