<div class="table-responsive mb-3">
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr class="text-center table-primary">
                <th>ID</th>
                <th>Clasificación</th>
                <th nowrap>Hora</th>
                <th>Solicitante</th>
                <th>Información telefonica</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Receptor de llamada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($calls as $call)
            <tr>
                <td class="text-center" nowrap>
                    @if($edit)
                        <a href="{{ route('samu.call.edit',$call) }}" class="btn btn-sm btn-outline-primary">
                            <i class="fas fa-edit"></i> {{ $call->id }}
                        </a>
                    @else
                        {{ $call->id }}
                    @endif
                </td>
                <td>
                    @if($call->classification)
                        {{ $call->classification }} 
                        @if($call->classification != 'OT')
                            <br> Evento: 
                            @foreach($call->events as $event)
                                <a href="{{ route('samu.event.edit', $event) }}" class="link-primary"> {{ $event->id }}</a>, 
                            @endforeach
                        @endif
                    @endif
                    @if($call->referenceCall)
                        Referencia: <a href="{{ route('samu.call.edit',$call->referenceCall) }}">{{ $call->referenceCall->id }}</a>
                    @endif
                </td>
                <td width="90">{{ $call->hour }}</td>
                <td>{{ $call->applicant }}</td>
                <td>{{ $call->information }}</td>
                
                <td>{{ $call->address }} {{ optional($call->commune)->name }}</td>
                <td>{{ $call->telephone }}</td>
                <td>{{ $call->receptor->officialFullName }}</td>

            </tr>
            @endforeach   
        </tbody>
    </table>
</div>