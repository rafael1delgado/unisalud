<div>
@if($selectedMis)

    {{ $selectedMis }}
    <button class="btn btn-outline-secondary" wire:click="cancel">Cancelar</button>
@else
@foreach($openShift->mobilesInService as $mis)

<button wire:click="selectMis({{ $mis->id }})" class="btn btn-lg btn-primary" >
    {{ $mis->id }}
</button>

@endforeach
@endif
</div>
