<div>
    @if($mis->lunch_start_at)
        {{ $mis->lunch_start_at->format('H:i') }}
        
        @if($mis->lunch_end_at)
            {{ $mis->lunch_end_at->format('H:i') }}
            -
            ({{ $mis->lunch_start_at->diff($mis->lunch_end_at)->format('%H:%I') }})
        @else 
            <button wire:click="lunchEnd"  class="btn btn-sm btn-secondary pl-3 pr-3">Fin</button>
        @endif
    @else 
        <button wire:click="lunchStart" class="btn btn-sm btn-secondary">Iniciar</button>
    @endif
</div>