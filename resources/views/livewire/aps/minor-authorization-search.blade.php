<div>
        <form wire:submit.prevent="search">
            <div class="form-row pb-2">
                <div class="col-6 col-md-6">
                    <input type="text" class="form-control" placeholder="Rut sin digito verificador del apoderado" wire:model.lazy="searchByRun" autocomplete="off">
                </div>
                <div class="col-6 col-md-6 mb-2">
                    <input type="text" class="form-control" placeholder="Nombre y/o apellido del apoderado" wire:model.lazy="searchByName" autocomplete="off">
                </div>
                <div class="col-12 col-md-12">
                    <button type="button" class="btn btn-secondary mb-2 float-left" wire:click="clean">Limpiar</button>
                    <button type="submit" class="btn btn-primary mb-2 float-right"><i class="fa fa-search"></i> Buscar</button>
                </div>
            </div>
        </form>

    <div class="table-responsive">

        <table class="table table-sm table-borderer table-responsive-xl">
            <thead>
                <tr>
                    <th>F.Autorización</th>
                    <th>Id</th>
                    <th>Tipo</th>
                    <th>Rut alumno</th>
                    <th>Nombre alumno</th>
                    <th>Estado</th>
                    <th>Nombre apoderado</th>
                    <th></th>

                </tr>
            </thead>
            <tbody>
                @if($minorAuthorizations)
                @foreach( $minorAuthorizations as $minorAuthorization )
                    @if (!$minorAuthorization->authorized)
                        <tr style="background-color:#D3F8F8">
                    @else
                        <tr>
                    @endif

                    <td>{{ $minorAuthorization->authorization_date->format('d-m-Y') }}</td>
                    <td>{{ $minorAuthorization->id }}</td>
                    <td>{{ $minorAuthorization->type->name }}</td>
                    <td>{{ $minorAuthorization->run }}-{{ $minorAuthorization->dv }}</td>
                    <td>{{ $minorAuthorization->names }} {{ $minorAuthorization->fathers_family }} {{ $minorAuthorization->mothers_family }}</td>
                    <td>@if($minorAuthorization->authorized) Autorizado @else No autorizado @endif</td>
                    <td>{{ $minorAuthorization->authorizer->getOfficialFullNameAttribute() }}</td>
                    <td>
                        <a href="{{ route('aps.minor_authorizations.edit', $minorAuthorization) }}"
                            class="btn btn-sm btn-outline-secondary">
                            <span class="fas fa-edit" aria-hidden="true"></span>
                        </a>
                        <form method="POST" action="{{ route('aps.minor_authorizations.destroy', $minorAuthorization) }}" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-secondary btn-sm" onclick="return confirm('¿Está seguro de eliminar la información?');">
                                <span class="fas fa-trash-alt" aria-hidden="true"></span>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>

    </div>
</div>
