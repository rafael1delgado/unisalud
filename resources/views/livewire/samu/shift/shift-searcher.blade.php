<div>
    @include('samu.nav')

    <div class="row">
        <div class="col">
            <h3>
                <i class="fas fa-blender-phone"></i> Buscador Turnos
            </h3>
        </div>
    </div>

    <div class="row">
        <div class="col-6 col-md-2">
            <label class="form-label" for="for-date">Fecha</label>
            <input class="form-control" 
                type="date"
                id="for-date"
                autocomplete="off"
                wire:model="date">
        </div>
    </div>

    <div class="row mt-3">
        <div class="col">
            <div class="table-responsive">
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th></th>
                            <th>Estatus</th>
                            <th>Tipo</th>
                            <th>Apertura</th>
                            <th>Cierre</th>
                            <th>Creador</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($shifts as $shift)
                            <tr class="table-active"  wire:loading.remove>
                                <td>{{ $shift->id }}</td>
                                <td>{{ $shift->status_in_word }}</td>
                                <td>{{ $shift->type }}</td>
                                <td>{{ optional($shift->opening_at)->format('Y-m-d H:i') }}</td>
                                <td>{{ optional($shift->closing_at)->format('Y-m-d H:i') }}</td>
                                <td>{{ $shift->creator->official_name }}</td>
                            </tr>
                            <tr  wire:loading.remove>
                                <td colspan="6">
                                    Observacion: {{ $shift->observation }}
                                </td>
                            </tr>
                            <tr wire:loading.remove>
                                <td colspan="3">
                                    <p>Personal de turno:</p>
                                    @foreach($shift->users as $user)
                                        <li>
                                            {{ optional($user)->officialFullName }}
                                            -
                                            {{ optional($user->pivot)->JobType->name }}
                                        </li>
                                    @endforeach
                                </td>
                                <td colspan="3">
                                    <p>Móbiles de turno:</p>
                                    @foreach($shift->mobilesInService as $mis)
                                        <li>
                                            {{ optional($mis->mobile)->code }} {{ optional($mis->mobile)->name }}
                                            - Tipo {{ $mis->type }}
                                        </li>
                                    @endforeach
                                </td>
                            </tr>
                        @empty
                        <tr class="text-center" wire:loading.remove>
                            <td colspan="6">
                                <em>No hay resultados</em>
                            </td>
                        </tr>
                        @endforelse
                        <caption>
                            Total de resultados: {{ $shifts->count() }}
                        </caption>
                    </tbody>
                </table>
            </div>
        </div>  
    </div>
</div>
