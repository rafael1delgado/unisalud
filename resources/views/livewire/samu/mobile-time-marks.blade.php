<div>
@if($selectedEvent)
<ul class="list-group">

        <button class="list-group-item list-group-item-action {{ $selectedEvent->departure_at ? 'disabled':'active'}}" 
            wire:click="setTime('departure_at')">
            Aviso de salida
        </button>


        <button class="list-group-item list-group-item-action {{ $selectedEvent->mobile_departure_at ? 'disabled':'active'}}" 
            wire:click="setTime('mobile_departure_at')">
            Salida móvil
        </button>


        <button class="list-group-item list-group-item-action {{ $selectedEvent->mobile_arrival_at ? 'disabled':'active'}}" 
            wire:click="setTime('mobile_arrival_at')">
            Llegada al lugar
        </button>    

        <button class="list-group-item list-group-item-action {{ $selectedEvent->route_to_healtcenter_at ? 'disabled':'active'}}" 
            wire:click="setTime('route_to_healtcenter_at')">
            Ruta c.asistencial
        </button>

        <button class="list-group-item list-group-item-action {{ $selectedEvent->healthcenter_at ? 'disabled':'active'}}" 
            wire:click="setTime('healthcenter_at')">
            Centro asistencial
        </button>

        <button class="list-group-item list-group-item-action {{ $selectedEvent->patient_reception_at ? 'disabled':'active'}}" 
            wire:click="setTime('patient_reception_at')">
            Recepción de pcte
        </button>

        <button class="list-group-item list-group-item-action {{ $selectedEvent->return_base_at ? 'disabled':'active'}}" 
            wire:click="setTime('return_base_at')">
            Retorno base
        </button>

        <button class="list-group-item list-group-item-action {{ $selectedEvent->on_base_at ? 'disabled':'active'}}" 
            wire:click="setTime('on_base_at')">
            Móvil en base
        </button>
</ul>
<button class="mt-4 btn btn-outline-secondary" wire:click="cancel('selectedEvent')">Volver</button>
@else
    @if($selectedMis)
        <ul>
            @foreach($selectedMis->events->where('status',true) as $event)
            <li>
                <button wire:click="selectEvent({{ $event->id }})" class="btn btn-lg btn-primary">
                    QTC {{ $event->counter }}
                </button> 
            </li>
            @endforeach
        </ul>
        <button class="btn btn-outline-secondary" wire:click="cancel('selectedMis')">Volver</button>
    @else
        <ul>
            @foreach($openShift->mobilesInService as $mis)
            <li>
                <button wire:click="selectMis({{ $mis->id }})" class="btn btn-lg btn-primary">
                    {{ $mis->mobile->code }} {{ $mis->mobile->name }}
                </button>
            </li>
            @endforeach
        </ul>
    @endif
@endif
</div>
