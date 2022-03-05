<div>
    @include('samu.nav')

    <h3 class="mb-3"><i class="fas fa-car-crash"></i> Buscar cometido por ID</h3>
    
    <div class="form-inline mb-3">
        <div class="form-group mr-3">
            <input type="number" class="form-control" placeholder="id evento"
                wire:model="event_id">
        </div>
        <button type="submit" class="btn btn-primary" wire:click="find">Buscar</button>
    </div>

    @if($events)
        @if($events->isNotEmpty())
            @include('samu.event.partials.index', ['events' => $events ])
        @else
            <div class="alert alert-warning" role="alert">
                <strong>No hay resultados</strong>
            </div>
        @endif
    @endif
</div>
