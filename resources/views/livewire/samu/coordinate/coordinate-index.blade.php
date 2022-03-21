<div>
    @include('samu.nav')

    <h3 class="mb-3"><i class="fas fa-globe"></i> Coordenadas ingresadas</h3>

    <div class="row mb-3">
        <div class="col-12 col-md-10">
            <label class="form-label" for="for-search">Buscador</label>
            <input class="form-control" 
                type="text"
                id="for-search"
                autocomplete="off"
                wire:model="search"
                placeholder="Nombre, latitud, longitud u observación">
        </div>
        <div class="col-12 col-md-2">
            <label class="form-label" for="for-paginate">Por página</label>
            <select
                class="custom-select"
                wire:model="paginate"
                id="for-paginate">
                @foreach($paginates as $paginate)
                    <option value="{{ $paginate }}">{{ $paginate }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="table-responsive">
        <table class="table table-sm table-bordered table-striped small">
            <thead>
                <tr class="text-center table-info">
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Latitud</th>
                    <th>Longitud</th>
                    <th>Observación</th>
                    <th>Llamada ID</th>
                    <th class="text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse($coordinates as $coordinate)
                    <tr>
                        <td class="text-center">{{ $coordinate->id }}</td>
                        <td>{{ $coordinate->name }}</td>
                        <td>{{ $coordinate->latitude }}</td>
                        <td>{{ $coordinate->longitude }}</td>
                        <td>{{ $coordinate->observation }}</td>
                        <td class="text-center">
                            @if($coordinate->call)
                            <a class="nav-link" href=" {{ route('samu.call.edit', $coordinate->call) }}">
                                {{ $coordinate->call->id }}
                            @else 
                                -
                            @endif
                        </td>
                        <td class="text-center" style="width: 200px">
                            @if($edit && $selectedCoordinateId == $coordinate->id)
                            <select 
                                class="form-control form-control-sm" 
                                name="calls-{{ $coordinate->id }}"
                                id="calls-{{ $coordinate->id }}"
                                wire:model="selectedCallId" 
                                >
                                <option value="">Selecciona una llamada</option>
                                @foreach ($calls as $call)
                                    <option value="{{ $call->id }}" >
                                        ID: {{ $call->id }} - {{ $call->applicant }}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                            <div class="btn-group">
                                <button 
                                    class="btn btn-sm btn-success" 
                                    wire:click="assignCoordinate" 
                                    wire:loading.attr="disabled"
                                    wire:target="assignCoordinate">
                                    <span
                                        class="spinner-border spinner-border-sm"
                                        role="status"
                                        aria-hidden="true"
                                        wire:loading
                                        wire:target="assignCoordinate">
                                    </span>
                                    Guardar
                                </button>
                                <button 
                                    class="btn btn-sm btn-primary"
                                    wire:click="showButton({{ $coordinate }})"
                                    wire:loading.attr="disabled"
                                    wire:target="assignCoordinate">
                                    Cancelar
                                </button>
                            </div>
                            @else
                                <div class="btn-group">
                                    <button
                                        class="btn btn-sm btn-primary"
                                        wire:click="showButton({{ $coordinate }})"
                                        wire:loading.attr="disabled"
                                        wire:target="deleteCoordinate">
                                        Editar
                                    </button>
                                    <button 
                                        class="btn btn-sm btn-danger"    
                                        wire:click="deleteCoordinate({{ $coordinate }})"
                                        wire:loading.attr="disabled"
                                        wire:target="deleteCoordinate">
                                        <span
                                            class="spinner-border spinner-border-sm"
                                            role="status"
                                            aria-hidden="true"
                                            wire:loading
                                            wire:target="deleteCoordinate">
                                        </span>
                                        Eliminar
                                    </button>
                                </div>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr class="text-center">
                        <td colspan="7">
                            <em>No hay resultados</em>
                        </td>
                    </tr>
                @endforelse
                </tr>
            </tbody>
        </table>
        {{ $coordinates->links() }}
        <p class="text-end">
            Total resultados : {{ $coordinates->total() }}
        </p>
    </div>
</div>
