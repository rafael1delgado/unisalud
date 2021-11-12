<div>

<h3 class="mb-3">Citas disponibles</h3>
<hr/>

    <div class="form-row">
        <div class="form-group col-5 col-md-2">
            <label for="inputEmail4">Desde</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha inicio"
                wire:model="from">
                @error('from')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>

        <div class="form-group col-5 col-md-2">
            <label for="inputEmail4">Hasta</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha fin"
                wire:model="to">
                @error('to')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
        </div>

        <div class="form-group col-2 col-md-1">
            <label for="inputEmail4">&nbsp;</label>
            <button type="button" class="btn btn-primary form-control" wire:click="search()"> <i
                    class="fa fa-search" aria-hidden="true"></i> Buscar</button>
        </div>
    </div>

    <div class="table-responsive mt-3">
        <table class="table table-sm table-hover table-bordered">

            <thead class="table-info text-center">
                <tr>
                    <th scope="col" style="width: 5%">Identificación</th>
                    <th scope="col" style="width: 20%">Nombre Completo</th>
                    <th scope="col">Especialidad</th>
                    <th scope="col">Disponible</th>
                    <th scope="col">Citar</th>
                </tr>
            </thead>
            <tbody>
                @foreach($practitioners as $practitioner)
                <tr>
                    <td>
                        @foreach($practitioner->user->identifiers as $identifier)
                                {{ $identifier->value }}-{{ $identifier->dv }}<br>
                            @endforeach
                    </td>
                    <td>
                        {{ $practitioner->user->OfficialFullName }}
                    </td>
                    <td>
                        {{ $practitioner->specialty->specialty_name }}
                    </td>
                    <td>
                        {{$practitioner->appointments_available_count}}
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm" title="Citar" wire:click="appoint({{$practitioner->id}})">  <i class="fa fa-calendar"></i> </button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>