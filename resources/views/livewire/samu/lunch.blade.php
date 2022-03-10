<div>
    @if($mis->lunch_start_at)
        {{ $mis->lunch_start_at->format('H:i') }} 
        
        @if($mis->lunch_break_start_at)
            - {{ $mis->lunch_start_at->diff($mis->lunch_break_start_at)->format('%I') }}"
            - {{ $mis->lunch_break_start_at->format('H:i') }} 

            @if($mis->lunch_break_end_at)
                <br> {{ $mis->lunch_break_end_at->format('H:i') }} 

                @if($mis->lunch_end_at)
                    - {{ $mis->lunch_break_end_at->diff($mis->lunch_end_at)->format('%I') }}"
                    - {{ $mis->lunch_end_at->format('H:i') }}

                    <br> Total: {{ $mis->total_minutes }}"
                @else 
                    <br>
                    <button wire:click="lunchEnd" class="btn btn-sm btn-secondary pl-3 pr-3">
                        Fin
                    </button>
                @endif
            @else 
                <br>
                <button wire:click="lunchBreakEnd" class="btn btn-sm btn-secondary pl-3 pr-3">
                    Fin Pausa
                </button>
            @endif
        @else 
            @if($mis->lunch_end_at)
                - {{ $mis->lunch_end_at->format('H:i') }}
                - {{ $mis->total_minutes }}"
                
            @else
                <br>
                <button wire:click="lunchBreakStart" class="btn btn-sm btn-secondary pl-3 pr-3">
                    Ir Pausa
                </button>
                <button wire:click="lunchEnd" class="btn btn-sm btn-secondary pl-3 pr-3">
                    Fin 
                </button>
            @endif
        @endif  
    @else 
        <button wire:click="lunchStart" class="btn btn-sm btn-secondary">
            Iniciar
        </button>
    @endif
</div>
