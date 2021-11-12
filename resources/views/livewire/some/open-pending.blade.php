<div>
    <h3 class="mb-3">Pendientes de apertura</h3>
    <hr/>
    <div>
        <div class="form-row">
            <div class="form-group col-5 col-md-2">
                <label for="inputEmail4">Desde</label>
                <input type="date" class="form-control" placeholder="Fecha inicio" wire:model="from" >
                @error('from')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-5 col-md-2">
                <label for="inputEmail4">Hasta</label>
                <input type="date" class="form-control" placeholder="Fecha fin" wire:model="to">
                @error('to')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="form-group col-2 col-md-1">
                <label for="inputEmail4">&nbsp;</label>
                <button type="button" class="btn btn-primary form-control" wire:click='search()'> <i
                        class="fa fa-search" aria-hidden="true" tittle="Aperturar"></i> Buscar</button>
            </div>
        </div>

        <div class="table-responsive mt-3">
            <table class="table table-sm table-hover table-bordered">

                <thead class="table-info text-center">
                    <tr>
                        <th scope="col" style="width: 5%">Identificación</th>
                        <th scope="col" style="width: 20%">Nombre Completo</th>
                        <th scope="col">Especialidad</th>
                        <th scope="col">Aperturas pendientes</th>
                        <th scope="col">Aperturar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($programmingProposals as $programmingProposal)
                    <tr>
                        <td>
                            @foreach($programmingProposal->user->identifiers as $identifier)
                                {{ $identifier->value }}-{{ $identifier->dv }}<br>
                            @endforeach
                        </td>
                        <td>
                            {{ $programmingProposal->user->OfficialFullName }}
                        </td>
                        <td>
                            {{-- agregar profesion --}}
                            {{ $programmingProposal->specialty->specialty_name }}
                        </td>
                        <td>
                            {{$programmingProposal->countUnopenedDetailsBetween($from, $to)}}
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm" wire:click="open({{$programmingProposal->id}})"> <i
                                    class="fa fa-calendar"></i> </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>