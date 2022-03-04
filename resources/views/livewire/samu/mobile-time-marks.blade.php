<div>

@if($selectedEvent)
    <h3 class="text-center mb-4"> 
        Móvil: {{ $selectedMis->mobile->code }} 
        {{ $selectedMis->mobile->name }} - 
        QTC: {{ $selectedEvent->counter }}
    </h3>

    <div class="row mb-4">
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-danger btn-block 
                {{ $selectedEvent->departure_at ? 'disabled':'active'}}" 
                @if(!$selectedEvent->departure_at) wire:click="setTime('departure_at')" @endif >
                Aviso de salida<br>
                {{ $selectedEvent->departure_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-warning btn-block 
                {{ $selectedEvent->mobile_departure_at ? 'disabled':'active'}}" 
                @if(!$selectedEvent->mobile_departure_at) wire:click="setTime('mobile_departure_at')" @endif >
                Salida móvil<br>&nbsp;
                {{ $selectedEvent->mobile_departure_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-warning btn-block
                {{ $selectedEvent->mobile_arrival_at ? 'disabled':'active'}}" 
                @if(!$selectedEvent->mobile_arrival_at) wire:click="setTime('mobile_arrival_at')" @endif >
                Llegada al lugar<br>&nbsp;
                {{ $selectedEvent->mobile_arrival_at }}
            </button>    
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-primary btn-block 
                {{ $selectedEvent->route_to_healtcenter_at ? 'disabled':'active'}}" 
                @if(!$selectedEvent->route_to_healtcenter_at) wire:click="setTime('route_to_healtcenter_at')" @endif >
                Ruta c.asistencial<br>&nbsp;
                {{ $selectedEvent->route_to_healtcenter_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-primary btn-block 
                {{ $selectedEvent->healthcenter_at ? 'disabled':'active'}}" 
                @if(!$selectedEvent->healthcenter_at) wire:click="setTime('healthcenter_at')" @endif >
                Centro asistencial<br>&nbsp;
                {{ $selectedEvent->healthcenter_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-primary btn-block 
                {{ $selectedEvent->patient_reception_at ? 'disabled':'active'}}" 
                @if(!$selectedEvent->patient_reception_at) wire:click="setTime('patient_reception_at')" @endif >
                Recepción de pcte<br>&nbsp;
                {{ $selectedEvent->patient_reception_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-info btn-block 
                {{ $selectedEvent->return_base_at ? 'disabled':'active'}}" 
                @if(!$selectedEvent->return_base_at) wire:click="setTime('return_base_at')" @endif >
                Retorno base<br>&nbsp;
                {{ $selectedEvent->return_base_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-success btn-block 
                {{ $selectedEvent->on_base_at ? 'disabled':'active'}}" 
                @if(!$selectedEvent->on_base_at) wire:click="setTime('on_base_at')" @endif >
                Móvil en base<br>&nbsp;
                {{ $selectedEvent->on_base_at }}
            </button>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <button class="btn btn-lg btn-outline-secondary btn-block p-4" 
                wire:click="cancel('selectedEvent')">Volver</button>
        </div>
    </div>
@else
    @if($selectedMis)
        <h3 class="text-center mb-4">Seleccione el QTC</h3>
        <div class="row mb-4">
            @foreach($selectedMis->events->where('status',true) as $event)
            <div class="col-6 pb-5">
                <button class="btn btn-lg btn-primary btn-block p-4"
                    wire:click="selectEvent({{ $event->id }})">
                    QTC {{ $event->counter }}
                </button> 
            </div>
            @endforeach
        </div>

        <div class="row">
            <div class="col-12">
                <button class="btn btn-lg btn-outline-secondary btn-block p-4" 
                    wire:click="cancel('selectedMis')">Volver</button>
            </div>
        </div>

    @else
        <h3 class="text-center mb-4">Seleccione el móvil</h3>
        <div class="row">
            @foreach($openShift->mobilesInService as $mis)
            <div class="col-6 pb-5">
                <button class="btn btn-lg btn-primary btn-block p-4"
                    wire:click="selectMis({{ $mis->id }})">
                    {{ $mis->mobile->code }} {{ $mis->mobile->name }}
                </button>
            </div>
            @endforeach
        </div>
    @endif
@endif
</div>
