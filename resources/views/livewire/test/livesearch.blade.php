<div class="form-group">
    <label>Ingrese la comuna</label>
    <input class="form-control" list="communes" wire:model.debounce.250ms="search">
    
    <datalist id="communes">
        @foreach($communes as $commune)
        <option value="{{ $commune->id }}">{{ $commune->name }}</option>
        @endforeach
    </datalist>
</div>