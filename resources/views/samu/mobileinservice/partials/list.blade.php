<div class="table-responsive">
    <table class="table table-stripped">
        <thead>
            <tr class="table-primary">
                <th></th>
                <th>Movil</th>
                <th>Posición</th>
                <th>Tipo</th>
                <th>Estado</th>
                <th>O2 central</th>
                <th>Observaciones</th>
                <th>Almuerzo</th>
                <th></th>
            </tr>
        </thead>
        <tbody>

            @foreach($mobilesInService as $mis)
            <tr>
                <td rowspan="2">
                @if($mis->shift->status == true)
                    <a href="{{ route('samu.mobileinservice.edit',$mis) }}">
                        <button class="btn btn-outline-primary"><i class="fas fa-edit"></i></button>
                    </a>
                @endif
                </td>
                <td>{{ $mis->mobile->code }} {{ $mis->mobile->name }}</td>
                <td>{{ $mis->position }}</td>
                <td>{{ $mis->type }}</td>
                <td>{{ $mis->status ? 'Activo' : 'Inactivo'  }}</td>
                <td>{{ $mis->o2 }}</td>
                <td>
                    {{ $mis->observation}} 
                </td>
                <td>
                    @livewire('samu.lunch',['mis' => $mis])
                </td>
                <td rowspan="2">
                    @if($mis->shift->status == true)
                    <form method="POST" action="{{ route('samu.mobileinservice.destroy' , $mis) }}">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                    </form>
                    @endif
                </td>
            </tr>
            <tr>
                <td colspan="6">

                    @if($mis->shift->status == true)
                        @livewire('samu.mobile-crew',['mobileInService' => $mis])
                    @else
                        @foreach($mis->crew as $tripulant)
                        <div class="form-row m-1">
                            <div class="col-5">
                                <li>
                                    {{ $tripulant->officialFullName }}
                                </li>
                            </div>
                            <div class="col-2">
                                {{ $tripulant->pivot->jobType->name }}
                            </div>
                            <div class="col-3">
                                {{ $tripulant->pivot->assumes_at }}
                            </div>
                            <div class="col-2">
                            </div>
                        </div>
                        @endforeach
                    @endif

                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>