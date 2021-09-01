<div>
    <div class="form-row">
        <div class="form-group col-md-2">
            <label for="inputEmail4">Desde</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha inicio"
                wire:model.lazy="appointments_from">
        </div>

        <div class="form-group col-md-2">
            <label for="inputEmail4">Hasta</label>
            <input type="date" class="form-control" id="inputEmail4" placeholder="Fecha fin"
                wire:model.lazy="appointments_to">
        </div>

        <div class="form-group col-md-1">
            <label for="inputEmail4">&nbsp;</label>
            <button type="button" class="btn btn-primary form-control" wire:click="searchAppointments()"> <i
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
                    <th scope="col">Citado/Disponible</th>
                    <th scope="col">Citar</th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($practitioners as $practitioner) --}}
                <tr>
                    <td>
                        16351236-k
                        {{-- @foreach($contactUser->user->identifiers as $identifier)
                            {{ $identifier->value }}-{{ $identifier->dv }}<br>
                        @endforeach --}}
                    </td>
                    <td>
                        Roberto Javier Carrillo Lioi
                        {{-- {{ $contactUser->user->OfficialFullName }} --}}
                    </td>
                    <!-- <td></td> -->
                    <td>
                        Traumatólogo
                    </td>
                    <td>
                        3/10
                    </td>
                    <td>
                        <button type="button" class="btn btn-primary btn-sm"> <i data-feather="file-text"></i> </button>
                    </td>
                </tr>
                {{-- @endforeach --}}
            </tbody>
        </table>
    </div>
</div>