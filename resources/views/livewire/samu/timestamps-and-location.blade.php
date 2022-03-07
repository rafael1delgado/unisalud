<div>
    <h3 class="text-center mb-4"> 
        Móvil: {{ $event->mobileInService->mobile->code }} 
        {{ $event->mobileInService->mobile->name }} - 
        QTC: {{ $event->counter }}
    </h3>

    <div class="row mb-4">
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-{{ $event->departure_at ? 'outline-':''}}danger btn-block 
                {{ $event->departure_at ? 'disabled':'active'}}" 
                @if(!$event->departure_at) wire:click="setTime('departure_at')" @endif >
                Aviso salida<br>
                {{ $event->departure_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-{{ $event->mobile_departure_at ? 'outline-':''}}warning btn-block 
                {{ $event->mobile_departure_at ? 'disabled':'active'}}" 
                @if(!$event->mobile_departure_at) wire:click="setTime('mobile_departure_at')" @endif >
                Salida móvil<br>&nbsp;
                {{ $event->mobile_departure_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-{{ $event->mobile_arrival_at ? 'outline-':''}}warning btn-block
                {{ $event->mobile_arrival_at ? 'disabled':'active'}}" 
                @if(!$event->mobile_arrival_at) wire:click="setTime('mobile_arrival_at')" @endif >
                Llegada lugar<br>&nbsp;
                {{ $event->mobile_arrival_at }}
            </button>    
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-{{ $event->route_to_healtcenter_at ? 'outline-':''}}primary btn-block 
                {{ $event->route_to_healtcenter_at ? 'disabled':'active'}}" 
                @if(!$event->route_to_healtcenter_at) wire:click="setTime('route_to_healtcenter_at')" @endif >
                Ruta hacia AP<br>&nbsp;
                {{ $event->route_to_healtcenter_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-{{ $event->healthcenter_at ? 'outline-':''}}primary btn-block 
                {{ $event->healthcenter_at ? 'disabled':'active'}}" 
                @if(!$event->healthcenter_at) wire:click="setTime('healthcenter_at')" @endif >
                En AP<br>&nbsp;
                {{ $event->healthcenter_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-{{ $event->patient_reception_at ? 'outline-':''}}primary btn-block 
                {{ $event->patient_reception_at ? 'disabled':'active'}}" 
                @if(!$event->patient_reception_at) wire:click="setTime('patient_reception_at')" @endif >
                Recepción de pcte<br>&nbsp;
                {{ $event->patient_reception_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-{{ $event->return_base_at ? 'outline-':''}}info btn-block 
                {{ $event->return_base_at ? 'disabled':'active'}}" 
                @if(!$event->return_base_at) wire:click="setTime('return_base_at')" @endif >
                Retorno base<br>&nbsp;
                {{ $event->return_base_at }}
            </button>
        </div>
        <div class="col-6 pb-5">
            <button class="btn btn-lg btn-{{ $event->on_base_at ? 'outline-':''}}success btn-block 
                {{ $event->on_base_at ? 'disabled':'active'}}" 
                @if(!$event->on_base_at) wire:click="setTime('on_base_at')" @endif >
                Móvil en base<br>&nbsp;
                {{ $event->on_base_at }}
            </button>
        </div>
    </div>

    <div class="row mb-4">
        <div class="col-12">
            <a class="btn btn-lg btn-outline-secondary btn-block p-4" 
                href="{{ route('samu.mobiles.mobile_selector') }}"
                >Volver</button>
        </div>
    </div>

</div>

@push('scripts')
<script>
    var options = {
        enableHighAccuracy: true,
        timeout: 5000,
        maximumAge: 0
    };

    function success(pos) {
        var crd = pos.coords;
        @this.set('latitude', crd.latitude);
        @this.set('longitude', crd.longitude);
        @this.emit('storeLocation');
    };

    function error(err) {
        console.warn('ERROR(' + err.code + '): ' + err.message);
    };

    function getLocation() {
        navigator.geolocation.getCurrentPosition(success, error, options);
        setTimeout(getLocation, 20000);
    }
    getLocation();
</script>
@endpush