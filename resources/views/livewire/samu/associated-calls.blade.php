<div class="table-responsive">
    <table class="table table-sm table-bordered table-striped">
        <thead>
            <tr class="text-center table-primary">
                <th>Asociar</th>
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
            @foreach($shift->calls->where('classification','<>','OT')->where('id','<>',$currentCall->id)->whereNull('call_id')->whereNotNull('classification')->sortByDesc('id') as $call)
            <tr>
                <td class="text-center">
                    @if(!$currentCall->call_id)
                        <button class="btn btn-sm btn-success" wire:click="associate({{ $call->id }})">Asociar a {{ $call->id }}</button>
                    @elseif($currentCall->call_id == $call->id)
                        <button class="btn btn-sm btn-outline-success" disabled>Asociado a {{ $call->id }}</button>
                    @else
                        {{ $call->id }}
                    @endif
                </td>
                <td>
                    @if($call->classification)
                        {{ $call->classification }} 
                        @if($call->classification != 'OT')
                            -  
                            @foreach($call->events as $event)
                                <a href="{{ route('samu.event.edit', $event) }}" class="link-primary"> {{ $event->id }}</a>, 
                            @endforeach
                        @endif
                    @endif
                </td>
                <td>{{ $call->hour }}</td>
                <td>{{ $call->applicant }}</td>
                <td>{{ $call->information }}</td>
                
                <td>{{ $call->address }}</td>
                <td>{{ $call->telephone }}</td>
                <td>{{ $call->receptor->officialFullName }}</td>

            </tr>
            @endforeach   
        </tbody>
    </table>
</div>